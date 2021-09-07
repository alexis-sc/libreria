<form action="{{ url('/libro/'.$libro->id) }}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH')}}
@include('libro.form');
</form>