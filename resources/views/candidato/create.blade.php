<form action="{{ url('/candidato') }}" method="post"  enctype="multipart/form-data">
@csrf
@include('candidato.form', ['modo'=>'Agregar'])
</form>