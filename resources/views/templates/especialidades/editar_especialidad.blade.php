@extends('templates-layouts.headerandfooter')
@section('body')
@if(empty(session('session_id')))
<script type="text/javascript">
    alert("No tiene los permisos suficientes para acceder a esta ventana por favor inicie sesión o contacte a un administrador");
    window.location.href = "/";
</script>
@else
<div class="inner-banner-w3ls">
    <div class="container">
    </div>
    <!-- //banner 2 -->
</div>
<!-- page details -->
<div class="breadcrumb-agile">
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('index')}}">Inicio</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Especialidades</li>
        </ol>
    </div>
</div>
<!-- //page details -->

<!-- contact -->
<div class="appointment py-5">
    <div class="py-xl-5 py-lg-3">
        <div class="w3ls-titles text-center mb-5">
            <h3 class="title">Crear nueva especialidad</h3>
            <span>
                <i class="fas fa-user-md"></i>
            </span>
        </div>
        <div class="d-flex">
            <div class="appoint-img">

            </div>
            <div class="contact-right-w3l appoint-form">
                <h5 class="title-w3 text-center mb-5">Llenar con los datos de la nueva especialidad</h5>
                <form action="{{route('actualizar_especialidad')}}" method="post">
                    @csrf
                    @foreach ($especialidades as $especialidad)
                    <input type="text" name="id" value="{{$especialidad->id_especialidad}}" hidden>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombre de la especialidad*:</label>
                        <input type="text" class="form-control" placeholder="Ingresa el nombre de la nueva especialidad"
                            name="especialidad" value="{{$especialidad->nombre_especialidad}}" id="especialidad" onkeyup="mayusculas()" required="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Precio:</label>
                        <input type="text" class="form-control" maxlength="6" placeholder="Ingresa el precio"
                            name="precio" value="{{$especialidad->precio}}" required="">
                    </div>
                    <div id="enviar">
                        <input type="submit" value="Actualizar especialidad" class="btn_apt">
                    </div>
                </form>
            </div>
            <div class="clerafix"></div>
                    @endforeach
        </div>
    </div>
</div>
@endsection
@endif