<?php

namespace App\Http\Controllers;

use App\Representante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;

class RepresentanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['representantes']= Representante::paginate(15);

        //dd($datos['representantes']);

        return view('representante.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('representante.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $campos=[
            'ApPaterno' => 'required|string|max:45',
            'ApMaterno' => 'required|string|max:45',
            'Nombres'   => 'required|string|max:60'
        ];
        $mensaje = [
            'required' => 'El campo :attribute es obligatorio',
            'max' => 'La longitud de :attribute debe ser menor de :max carácteres'
        ];
        $this->validate($request, $campos, $mensaje);
        $dataRepresentante = request()->except('_token');
        
       Representante::insert($dataRepresentante);
        // return response()->json($dataCandidato);
        return redirect('representante')->with('mensaje','Registro exitoso');
        //
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
        $representante = Representante::findOrFail($id);
        return view('representante.edit', compact('representante'));
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
        //
        $campos=[
            'ApPaterno' => 'required|string|max:45',
            'ApMaterno' => 'required|string|max:45',
            'Nombres'   => 'required|string|max:60'
        ];
        $mensaje = [
            'required' => 'El campo :attribute es obligatorio',
            'max' => 'La longitud de :attribute debe ser menor de :max carácteres'
        ];

        $this->validate($request, $campos, $mensaje);
        $dataRepresentante = request()->except(['_token','_method']);
         
        Representante::where('id','=',$id)->update($dataRepresentante);
        
        $representante = Representante::findOrFail($id);
        //return view('candidato.edit', compact('candidato')); -- Para que regrese al mismo formulario de edición
        return redirect('representante')->with('mensaje','Actualización exitosa');

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
        $representante = Representante::findOrFail($id);
        Representante::destroy($id);

        return redirect('representante')->with('mensaje','Borrado exitoso');
    }
}
