

@extends('layouts.app')
@section('content')

<div class = 'container'>
<div class="card">

<div class="card-header"> <a href="{{ url('representante/')}}">Inicio</a> / {{ $modo }} representante</div>
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
            <input type="text" placeholder="Nombre" class="form-control" id = "Nombres"  name ="Nombres" value="{{ isset($representante->Nombres)?$representante->Nombres:old('Nombres') }}" required>
         </div>
    </div>


    <div class="form-group row">
        <label for="ApPaterno" class="col-md-2 col-form-label text-md-right"> Apellido paterno: </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id = "ApPaterno" name ="ApPaterno" value="{{ isset($representante->ApPaterno)?$representante->ApPaterno:old('ApPaterno') }}" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="ApMaterno" class="col-md-2 col-form-label text-md-right"> Apellido materno: </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id = "ApMaterno"  name ="ApMaterno" value="{{ isset($representante->ApMaterno)?$representante->ApMaterno:old('ApMaterno') }}" required>
        </div>
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
