@extends('layouts.app')

@section('content')
<div class="card text-center">
    <div class="card-body">
        <div class="container mt-5 ">
            <div class="row d-flex justify-content-center">
                <div class="col-md-7">

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label text-dark">Nombre</label>
                        <div class="col-sm-8">
                            <input class="form-control" name="nombre" id="nombre" value="{{ isset($libro->nombre)?$libro->nombre:'' }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label text-dark">Autor</label>
                        <div class="col-sm-8">
                            <input class="form-control" name="autor" id="autor" value="{{ isset($libro->autor)?$libro->autor:'' }}">
                        </div>
                    </div>
                    <div class="mb-3 row">

                        <label class="col-sm-2 col-form-label text-dark">Descripcion</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" aria-label="With textarea" name="descripcion" id="descripcion" value="">{{ isset($libro->descripcion)?$libro->descripcion:'' }}</textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label text-dark">Imagen</label>
                        <div class="col-sm-8">
                        <input type="file" name="imagen" id="imagen" value="{{ isset($libro->imagen)?$libro->imagen:'' }}">
                        </div>
                    </div>


                    <input type="submit" value="Enviar" id="Enviar">

                    <a href="{{ url('libro/') }}">Regresar</a>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection