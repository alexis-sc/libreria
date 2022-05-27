@extends('layouts.app')

@section('content')
<div class="container">
@if (Session::has('mensaje'))
    {{Session::get('mensaje')}}
@endif

    <a href="{{ url('libro/create') }}">Nuevo libro</a> 

<table class="table table-responsive-sm">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Autor</th>
            <th>Descripcion</th>
            <th>Imagen</th>
            <th></th>
            <th></th>


        </tr>
    </thead>
    <tbody>
     @foreach($libros as $libro)
        <tr>
            <td>{{ $libro->id }}</td>
            <td>{{ $libro->nombre }}</td>
            <td>{{ $libro->autor }}</td>
            <td>{{ $libro->descripcion }}</td>
            <td>
                <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$libro->imagen}}"  alt="">
            </td>
            <td>
               

                <form action="{{ url('/libro/'.$libro->id.'/edit') }}">
                <button type="submit" class="btn btn-info">Editar</button>
                </form>
</td>
<td>
            <form action="{{ url('/libro/'.$libro->id) }}" method="POST">
            @csrf
            {{ method_field('DELETE') }}
            <input type="submit" class="btn btn-danger" value="Borra">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection