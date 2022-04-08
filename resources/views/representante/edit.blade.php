<form action="{{ url('/representante/'.$representante->id) }}" method="post"  enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}

@include('representante.form', ['modo'=>'Editar'])
</form>