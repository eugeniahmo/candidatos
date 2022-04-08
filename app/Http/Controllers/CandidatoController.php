<?php

namespace App\Http\Controllers;

use App\Candidato;
use App\Representante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['candidatos']= Candidato::paginate(15);

        return view('candidato.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //$representantes['representante'] = Representante::pluck('Nombres','id');
        $rl = Representante::all();
        return view('candidato.create')->with('rl', $rl);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'ApPaterno' => 'required|string|max:45',
            'ApMaterno' => 'required|string|max:45',
            'Nombres'   => 'required|string|max:60',
            'Domicilio' => 'required|string|max:150',
            'Telefono'  => 'required|string|max:11',
            'Email'     => 'required|email|max:150',
            'Acta'      => 'required|max:1000|mimes:jpeg,png,jpg,PDF',
            'INE'      => 'required|max:1000|mimes:jpeg,png,jpg,PDF',
        ];
        $mensaje = [
            'required' => 'El campo :attribute es obligatorio',
            'max' => 'La longitud de :attribute debe ser menor de :max carácteres',
            'email' => 'El formato del email es incorrecto'

        ];
        $this->validate($request, $campos, $mensaje);

        $dataCandidato = request()->except('_token');
        
        if($request->hasFile('Acta'))
        {
            $dataCandidato['Acta'] = $request->file('Acta')->store('uploads','public');   
        }
        
        if($request->hasFile('INE'))
        {
            $dataCandidato['INE'] = $request->file('INE')->store('uploads','public');  
        }

        Candidato::insert($dataCandidato);
        // return response()->json($dataCandidato);
        return redirect('candidato')->with('mensaje','Registro exitoso');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function show(Candidato $candidato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $rl = Representante::all();
        
        $candidato = Candidato::findOrFail($id);
        return view('candidato.edit', compact('candidato'),compact('rl'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'ApPaterno' => 'required|string|max:45',
            'ApMaterno' => 'required|string|max:45',
            'Nombres'   => 'required|string|max:60',
            'Domicilio' => 'required|string|max:150',
            'Telefono'  => 'required|string|max:11',
            'Email'     => 'required|email|max:150'
        ];
        $mensaje = [
            'required' => 'El campo :attribute es obligatorio',
            'max' => 'La longitud de :attribute debe ser menor de :max carácteres',
            'email' => 'El formato del email es incorrecto'

        ];

        if($request->hasFile('Acta'))
        {
           $campos=['Acta'=>'required|max:1000|mimes:jpeg,png,jpg,pdf'];
           $mensaje=['Acta.required' => 'El Acta es requirida'];  
        }
        if($request->hasFile('INE'))
        {
           $campos=['INE'=>'required|max:1000|mimes:jpeg,png,jpg,pdf'];
           $mensaje=['INE.required' => 'La INE es requirida'];  
        }

        $this->validate($request, $campos, $mensaje);

        $dataCandidato = request()->except(['_token','_method']);
               
        if($request->hasFile('Acta'))
        {
            $candidato = Candidato::findOrFail($id);
            Storage::delete('public/'.$candidato->Acta);
            $dataCandidato['Acta'] = $request->file('Acta')->store('uploads','public');   
        }
        if($request->hasFile('INE'))
        {
            $candidato = Candidato::findOrFail($id);
            Storage::delete('public/'.$candidato->INE);
            $dataCandidato['INE'] = $request->file('INE')->store('uploads','public');   
        }

        Candidato::where('id','=',$id)->update($dataCandidato);
        
        $candidato = Candidato::findOrFail($id);
        //return view('candidato.edit', compact('candidato')); -- Para que regrese al mismo formulario de edición
        return redirect('candidato')->with('mensaje','Actualización exitosa');

        


        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $candidato = Candidato::findOrFail($id);
        Storage::delete('public/'.$candidato->INE);
        Storage::delete('public/'.$candidato->Acta);
        Candidato::destroy($id);

        return redirect('candidato')->with('mensaje','Borrado exitoso');
    }
}
