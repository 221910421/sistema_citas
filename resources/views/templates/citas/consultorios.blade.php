<label for="recipient-name" class="col-form-label">Consultorio*:</label>
<select name="consultorio" id="consultorio" class="form-control" onchange="restaturarfecha()">
    <option value="0">Selecciona un consultorio</option>
    @foreach($consultorios as $consultorio)
    <option value="{{$consultorio->id_consultorio}}">{{$consultorio->numero_de_consultorio}}</option>
    @endforeach
</select>

<script type="text/javascript">
    function restaturarfecha() {
        $('#fechas').html('<label for="recipient-name" class="col-form-label">Fecha*:</label><input type="date" min="{{$next_date}}" name="fecha" id="fecha" class="form-control" value="" required onchange="comprobarHora()">');
    }
</script>