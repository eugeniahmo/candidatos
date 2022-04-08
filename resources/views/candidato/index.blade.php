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
        <a href="{{ url('candidato/create')}}" class="btn btn-primary">Agregar candidato</a>
        </div>
    </div>


        <table class="table table-stripe">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Nombres</th>
                    <th>Domicilio</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Documentos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($candidatos as $candidato)
                <tr>
                  <td>{{ $candidato->id }}</td>
                  <td>{{ $candidato->ApPaterno }}</td>
                  <td>{{ $candidato->ApMaterno }}</td>
                  <td>{{ $candidato->Nombres }}</td>
                  <td>{{ $candidato->Domicilio }}</td>
                  <td>{{ $candidato->Telefono }}</td>
                  <td>{{ $candidato->Email }}</td>

                  <!-- Hay que linkear el storage: php artisan storage:link --> 
                  <td> <a href="{{ url('/storage/'.$candidato->Acta )}}">Acta |
                  <a href="{{ url('/storage/'.$candidato->INE ) }}">INE </a> </td>
                  <td>

<a href="{{url('/candidato/'.$candidato->id.'/edit')}}" class="btn btn-warning">Editar</a>                  
<form action="{{ url('/candidato/'.$candidato->id)}}" class="d-inline" method = "post">
@csrf
{{method_field('DELETE')}}

<input type="submit" class="btn btn-danger" onclick="return confirm('¿Desea eliminar el candidato?')" value="Borrar">
</form>

                  </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $candidatos->links() }}
</div>
@endsection