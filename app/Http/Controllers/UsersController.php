<?php

namespace App\Http\Controllers;

use App\Comunidad;
use App\Contabilidad;
use App\Http\Requests\CreatePropietariosRequest;
use App\Http\Requests\EditPropietariosRequest;
use App\Propiedades;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class UsersController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Sino existe la comunidad tenemos que crearla
        $comunidad = Comunidad::all();

        if (count($comunidad) == '0') {

            return redirect()->route('comunidad.create');

        }

        $comunidad = $comunidad->first();
        
        if ($comunidad->paso_registro == '3') {
            $comunidad->paso_registro = '4';
            $comunidad->save();
        }


        $propietarios = User::paginate(10);

        return view('admin.propietarios.index', compact('propietarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $propietarios = User::all();

        return view('admin.propietarios.create', compact('propietarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePropietariosRequest $request)
    {
        $propietario = new User([
            'nombre' => $request['nombre'],
            'apellidos' => $request['apellidos'],
            'dni'   => $request['dni'],
            'telefono' => $request['telefono'],
            'email' => $request['email'],
            'password' => $request['password'],
            'observaciones' => $request['observaciones'],
            'perfil' => isset($request['perfil']) ? $request['perfil'] : 'user'
        ]);

        $propietario->save();

        // Si ha elegido continuar creando
        if (isset($request['continuar']) && $request['continuar'] == '1') {

            return redirect()->route('propietarios.create');

        }

        return redirect()->route('propietarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Buscamos el propietario
        $propietario = User::findOrFail($id);

        // Buscamos los ingresos
        $movimientos = Contabilidad::where('propietario_id', $id)
            ->orderBy('fecha')
            ->paginate(10);

        return view('admin.propietarios.show', compact('movimientos', 'propietario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $propietario = User::findOrFail($id);

        return view('admin.propietarios.edit', compact('propietario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditPropietariosRequest $request, $id)
    {
        $propietario = User::findOrFail($id);

        $propietario->fill($request->all());

        $propietario->perfil = $request->perfil == 'admin' ? 'admin' : 'user';

        $propietario->save();

        return redirect()->route('propietarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $propietario = User::findOrFail($id);

        $propietario->delete();

        $message = 'El propietario ' . $propietario->name . ' fue eliminado.';

        // Respuesta para petición Ajax
        if ($request->ajax()) {
            return $message;
        }

        Session::flash('message', $message);
        return redirect()->route('propietarios.index');
    }
}
