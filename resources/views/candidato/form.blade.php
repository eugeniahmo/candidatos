

@extends('layouts.app')
@section('content')

<div class = 'container'>
<div class="card">

<div class="card-header"> <a href="{{ url('candidato/')}}">Inicio</a> / {{ $modo }} candidato</div>
        @if(count($errors)>0)
            <div class="alert alert-danger" role = "alert">   
            <ul>    
                @foreach($errors->all() as $error)         
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
    
            @endif

<div class="card-body">
    
    <div class="form-group row">
        <label for="Nombres" class="col-md-2 col-form-label text-md-right"> Nombre(s): </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id = "Nombres"  name ="Nombres" value="{{ isset($candidato->Nombres)?$candidato->Nombres:old('Nombres') }}" required>
         </div>
    </div>

    <div class="form-group row">
        <label for="ApPaterno" class="col-md-2 col-form-label text-md-right"> Apellido paterno: </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id = "ApPaterno" name ="ApPaterno" value="{{ isset($candidato->ApPaterno)?$candidato->ApPaterno:old('ApPaterno') }}" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="ApMaterno" class="col-md-2 col-form-label text-md-right"> Apellido materno: </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id = "ApMaterno"  name ="ApMaterno" value="{{ isset($candidato->ApMaterno)?$candidato->ApMaterno:old('ApMaterno') }}" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="Domicilio" class="col-md-2 col-form-label text-md-right"> Domicilio: </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id = "Domicilio"  name ="Domicilio"  value="{{ isset($candidato->Domicilio)?$candidato->Domicilio:old('Domicilio') }}" required>
         </div>
    </div>

    <div class="form-group row">
        <label for="Telefono" class="col-md-2 col-form-label text-md-right"> Telefono: </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id = "Telefono"  name ="Telefono"  value="{{ isset($candidato->Telefono)?$candidato->Telefono:old('Telefono') }}" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="Email" class="col-md-2 col-form-label text-md-right"> Email: </label>
        <div class="col-sm-10">
        <input type="email" id = "Email"  class="form-control" name ="Email"  value="{{ isset($candidato->Email)?$candidato->Email:old('Email') }}" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="Representante" class="col-md-2 col-form-label text-md-right"> Representante legal: </label>
        <div class="col-sm-10">
  

      <select  class="form-control" name ="representante_id" id="representante_id" required placeholder="Seleccione">
             @foreach ($rl as $replegal)
                 <option  {{ ( $candidato->representante_id == $replegal->id ? "selected":"") }} value="{{ $replegal->id }}">{{ $replegal->Nombres }}</option> 
            @endforeach 
        </select>
        </div>
    </div>


    <div class="form-group row">
        <label for="Acta" class="col-md-2 col-form-label text-md-right"> Acta de nacimiento: </label>
        <input type="file" id = "Acta" name ="Acta" value="{{ old('Acta') }}">
                @if (isset($candidato->Acta))
                    <a href="{{ url('/storage/'.$candidato->Acta )}}"><img src="{{ asset('storage').'/'.$candidato->Acta }} " width = "100" height = "100"></a>
                @endif
    </div>


    <div class="form-group row ">
        <label for="INE" class="col-md-2 col-form-label text-md-right"> INE: </label>

                <input type="file" id = "INE" name ="INE" value="{{ old('INE') }}">
                @if(isset($candidato->INE))
                    <a href="{{ url('/storage/'.$candidato->INE )}}">
                        <img src="{{ asset('storage').'/'.$candidato->INE }}" width = "100" height = "100" ></a>
                @endif
   
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <input type="submit" value="{{ $modo }}" class="btn btn-primary" >
        </div>
    </div>
    

    </div>
</div>
</div>

@endsection
