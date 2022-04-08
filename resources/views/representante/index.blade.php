@extends('layouts.app')
@section('content')

<div class = 'container'>

   
        @if(Session::has('mensaje'))
            <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong> {{ Session::get('mensaje', '') }} </strong>
            </div>
        @endif
       
            <div class="form-group row mb-1">
            <div class="col-md-8 offset-md-10">
            <a href="{{ url('representante/create')}}" class="btn btn-primary">Agregar representante</a>
            </div>
    </div>


     <table class="table table-striped">
            <thead class="thead-light">
                
                <tr>
                    <th>#</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Nombres</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($representantes as $representante)
                <tr>
                  <td>{{ $representante->id }}</td>
                  <td>{{ $representante->ApPaterno }}</td>
                  <td>{{ $representante->ApMaterno }}</td>
                  <td>{{ $representante->Nombres }}</td>

                 <td>
<a href="{{url('/representante/'.$representante->id.'/edit')}}" class="btn btn-warning">Editar</a>                  
<form action="{{ url('/representante/'.$representante->id)}}" class="d-inline" method = "post">
@csrf
{{method_field('DELETE')}}
<input type="submit" class="btn btn-danger" onclick="return confirm('¿Desea eliminar el representante?')" value="Borrar">
</form>

                  </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $representantes->links() }}
</div>
@endsection