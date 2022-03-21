<label for="recipient-name" class="col-form-label">Consultorio*:</label>
<select name="consultorio" id="consultorio" class="form-control">
    <option value="0">Selecciona un consultorio</option>
    @foreach($consultorios as $consultorio)
    <option value="{{$consultorio->id_consultorio}}">{{$consultorio->numero_de_consultorio}}</option>
    @endforeach
</select>