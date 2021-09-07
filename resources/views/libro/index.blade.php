@extends('layouts.app')

@section('content')
<div class="container">
@if (Session::has('mensaje'))
    {{Session::get('mensaje')}}
@endif
<a href="{{ url('libro/create') }}">Nuevo libro</a> 
<table class="table table-sm">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Autor</th>
            <th>Descripcion</th>
            <th>Imagen</th>
            <th>Acciones</th>

        </tr>
    </thead>
    <tbody>
     @foreach($libros as $libro)
        <tr>
            <td>{{ $libro->id }}</td>
            <td>{{ $libro->nombre }}</td>
            <td>{{ $libro->autor }}</td>
            <td>{{ $libro->descripcion }}</td>
            <td>{{ $libro->imagen }}</td>
            <td>
                <a href="{{ url('/libro/'.$libro->id.'/edit') }}">
                    Editar
                </a>

            <form action="{{ url('/libro/'.$libro->id) }}" method="POST">
            @csrf
            {{ method_field('DELETE') }}
            <input type="submit" onclick="return confirm('Quieres borrar el libro')" 
            value="Borra">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection