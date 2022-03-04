<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>
                    <h3>Nombre completo</h3>
                </th>
                <th>
                    <h3>Foto</h3>
                </th>
                <th>
                    <h3>Genero</h3>
                </th>
                <th>
                    <h3>Edad</h3>
                </th>
                <th>
                    <h3>Telefono</h3>
                </th>
                <th>
                    <h3>Correo</h3>
                </th>
               <th>
                   <h3>Opciones</h3>
               </th> 
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
            <tr>
                <td>{{$usuario->nombre}} {{$usuario->apellido_paterno}} {{$usuario->apellido_materno}}</td>
                <td><img src="{{('images/user/'.$usuario->foto)}}" class="foto_perfil" alt="foto de perfil"
                        height="60px" ; width="60"></td>
                <td>{{$usuario->genero}}</td>
                <td>{{$usuario->edad}}</td>
                <td>{{$usuario->telefono}}</td>
                <td>{{$usuario->correo}}</td>
                <td><form action="{{route('detallesusu')}}" method="post">
                    @csrf
                    <input type="text" name="id_usu" value="{{$usuario->nombre}}" readonly hidden>
                    <input type="submit" value="Ver detalles">
                </form></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>