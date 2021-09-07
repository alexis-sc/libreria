<form action="{{ url('/libro') }}" method="post" enctype="multipart/form-data">
@csrf
@include('libro.form');
</form>