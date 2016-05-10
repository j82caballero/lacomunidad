<?php

namespace App\Http\Controllers;

use App\Comunidad;
use Validator;

use App\Http\Requests\CreateComunidadRequest;
use App\Http\Requests\EditComunidadRequest;

use App\Http\Requests;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ComunidadController extends Controller
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
    public function index(Comunidad $comunidad)
    {

        // Sino existe la comunidad, tenemos que crearla
        if ($comunidad->all()->first() == null) {
            return redirect()->route('comunidad.create');
        }

        // Comprobamos si está registrada la comunidad
        $comunidad = Comunidad::all()->first();

        return view('admin.comunidad.index', compact('comunidad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comunidad = Comunidad::all();

        if (count($comunidad) != 0) {
            return redirect()->route('comunidad.index');
        }

        return view('admin.comunidad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateComunidadRequest $request)
    {

        $file = $request->image;

        // Si existe la imagen la guardamos
        if ($file) {

            //Creamos una instancia de la libreria instalada
            $image = Image::make($request->image);
            //Ruta donde queremos guardar las imagenes
            $path = public_path().'/imagenes/comunidad/';

            // Guardar Original
            //$image->save($path.$file->getClientOriginalName());

            // Cambiar de tamaño
            $image->resize(240,200);
            // Guardar
            $image->save($path.'thumb_'.$file->getClientOriginalName());

        }


        // Guardamos en la BD
        $comunidad = new Comunidad();

        $comunidad->nombre = $request->nombre;
        $comunidad->cif = $request->cif;
        $comunidad->direccion = $request->direccion;
        $comunidad->provincia = $request->provincia;
        $comunidad->poblacion = $request->poblacion;
        $comunidad->codpostal = $request->codpostal;

        // Si existe la imagen, guardamos la ruta en la BBDD, sino dejamos la de por defecto
        $comunidad->image = $file != null ? '/imagenes/comunidad/thumb_'.$file->getClientOriginalName() : 'img/comunidad_avatar.jpg';
        $comunidad->descripcion = $request->descripcion;

        $comunidad->paso_registro = '2';

        $comunidad->save();

        return redirect()->route('comunidad.index');
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
        $comunidad = Comunidad::findOrFail($id);

        return view('admin.comunidad.edit', compact('comunidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditComunidadRequest $request, $id)
    {
        //Buscamos la comunidad
        $comunidad = Comunidad::findOrFail($id);

        $file = $request->image;

        // Si existe la imagen la guardamos
        if ($file) {

            //Creamos una instancia de la libreria instalada
            $image = Image::make($request->image);
            //Ruta donde queremos guardar las imagenes
            $path = public_path().'/imagenes/comunidad/';

            // Guardar Original
            //$image->save($path.$file->getClientOriginalName());

            // Cambiar de tamaño
            $image->resize(240,200);
            // Guardar
            $image->save($path.'thumb_'.$file->getClientOriginalName());

        }

        $comunidad->nombre = $request->nombre;
        $comunidad->cif = $request->cif;
        $comunidad->direccion = $request->direccion;
        $comunidad->provincia = $request->provincia;
        $comunidad->poblacion = $request->poblacion;
        $comunidad->codpostal = $request->codpostal;

        // Si existe la imagen, guardamos la ruta en la BBDD, sino dejamos la de por defecto
        $comunidad->image = $file != null ? '/imagenes/comunidad/thumb_'.$file->getClientOriginalName() : $comunidad->image;
        $comunidad->descripcion = $request->descripcion;

        $comunidad->save();

        return redirect()->route('comunidad.index');
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
