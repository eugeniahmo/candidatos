<form action="{{ url('/candidato/'.$candidato->id) }}" method="post"  enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}

@include('candidato.form', ['modo'=>'Editar'])
</form>