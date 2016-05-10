<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre' => 'required|max:255',
            'apellidos' => 'required|max:255',
            'dni'   => 'required|max:8',
            'telefono'  => 'required|max:9',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = new User([
            'nombre' => $data['nombre'],
            'apellidos' => $data['apellidos'],
            'dni'   => $data['dni'],
            'telefono' => $data['telefono'],
            'email' => $data['email'],
            'password' => $data['password'],
            'observaciones' => $data['observaciones']
        ]);

        // Comprobamos si es el primer usuario registrado

        if (count(User::all())== 0) {
            $user->perfil = 'admin';
        }

        // Creamos el token para la confirmacion de email
        $user->registration_token = str_random(40);
        $user->save();

        // Url del token para la confirmación del email
        $url = route('confirmation', ['token' => $user->registration_token]);

        // Mandamos el mensaje de confirmación de email
        Mail::send('auth/emails/registration', compact('user', 'url'), function ($m) use ($user) {
            $m->to($user->email, $user->name)->subject('Activa tu cuenta!!');
        });

        $user->save();

        return $user;

    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

//        Auth::guard($this->getGuard())->login($this->create($request->all()));
//
//        return redirect($this->redirectPath());

        $user = $this->create($request->all());

        return redirect('login')
            ->with('alert', 'Por favor confirma tu email: ' . $user->email);
    }

    // Si ha confirmado el email, ponemos registration_token a null para que
    // el usuario pueda inicializar sesión
    protected function getConfirmation($token)
    {
        $user = User::where('registration_token', $token)->firstOrFail();
        $user->registration_token = null;
        $user->save();

        return redirect('login')
            ->with('alert', 'Email confirmado, ahora puedes iniciar sesión!!');
    }

    // Con esta función se consigue que hasta que el usuario
    // no confirme su email con el enlace que se le envía al correo
    // no pueda acceder al sistema
    protected function getCredentials($request)
    {
        return [
            'email' => $request->get('email'),
            'password'  => $request->get('password'),
            'registration_token' => null
        ];
    }
}
