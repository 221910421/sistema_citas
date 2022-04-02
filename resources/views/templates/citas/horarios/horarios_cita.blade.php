
@if(count($citas) == 0)
<label for="recipient-name" class="col-form-label">Hora de la cita*:</label>
<select name="hora" id="hora" class="form-control" required>
    <option value="">Selecciona la hora de su cita</option>
    @foreach($horas as $hora)
    <option value="{{$hora->hora}}">{{$hora->hora}}</option>
    @endforeach
</select>
@elseif(count($citas) >= 1)
<label for="recipient-name" class="col-form-label">Hora de la cita*:</label>
<select name="hora" id="hora" class="form-control" required>
    <option value="">Selecciona la hora de su cita</option>
    @foreach($citas as $cita)
    @foreach($horas as $hora)
    @if($cita->hora_cita == $hora->hora) 
    <option value="{{$hora->hora}}" disabled>{{$hora->hora}}</option>
    @endif
    @if($cita->hora_cita != $hora->hora)
    <option value="{{$hora->hora}}">{{$hora->hora}}</option>
    @endif
    @endforeach
    @endforeach
</select>
@endif
