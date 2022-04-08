<form action="{{ url('/representante') }}" method="post"  enctype="multipart/form-data">
@csrf
@include('representante.form', ['modo'=>'Agregar'])
</form>