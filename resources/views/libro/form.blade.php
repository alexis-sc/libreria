<label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" value="{{ isset($libro->nombre)?$libro->nombre:'' }}">
    <br>
    <label for="autor">Autor</label>
    <input type="text" name="autor" id="autor" value="{{ isset($libro->autor)?$libro->autor:'' }}">
    <br>
    <label for="descripcion">Descripcion</label>
    <input type="text" name="descripcion" id="descripcion" value="{{ isset($libro->descripcion)?$libro->descripcion:'' }}">
    <br>
    <label for="imagen">Imagen</label>
    <input type="file" name="imagen" id="imagen"value="{{ isset($libro->imagen)?$libro->imagen:'' }}">
    <br>
    <input type="submit" value="Enviar" id="Enviar">

    <a href="{{ url('libro/') }}">Regresar</a> 

    <br>