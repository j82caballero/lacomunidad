<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;

class JuntasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtenemos los vecinos con propiedad
        $propietarios = User::has('propiedad')->get();

        return view('admin.juntas.index', compact('propietarios'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! isset($request['propietario_id'], $request['texto'])) {

            return redirect()->route('junta.index');

        }

        $texto = $request['texto'];

        if ($request['propietario_id'] == 'all') {

            $propietarios = User::all();

            // Mandamos el correo a cada uno de los propietarios
            foreach ($propietarios as $propietario) {
                // Mandamos el mensaje de confirmación de email
                Mail::send('admin.juntas.partials.email', compact('propietario', 'texto'), function ($m) use ($propietario) {
                    $m->to($propietario->email, $propietario->name)->subject('Aviso Junta de Vecinos!!');
                });
            }

        } else {

            $propietario = User::findOrFail($request['propietario_id']);

            // Mandamos el mensaje de confirmación de email
            Mail::send('admin.juntas.partials.email', compact('propietario', 'texto'), function ($m) use ($propietario) {
                $m->to($propietario->email, $propietario->name)->subject('Aviso Junta de Vecinos!!');
            });

        }
        
        return redirect()->route('junta.index')
            ->with('alert', 'Email enviado!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
