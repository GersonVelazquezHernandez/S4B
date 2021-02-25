@extends('layouts.plantilla')
@section('title', 'Crear Empleado')


@section('content')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Crea un nuevo Empleado
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box" style="max-width: 720px;">
        <div class="box-header with-border">
          <h3 class="box-title">Escribe los datos del empleado.</h3>

        </div>
        <div class="box-body">
          <form id="formulario" method="POST" action="{{route('employees.store')}}">
            @csrf
            <div class="form-group row">
              <label for="inputNombre" class="col-sm-2 col-form-label">Nombre</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nombre" id="inputNombre" placeholder="Escribe el nombre...">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputApellido" class="col-sm-2 col-form-label">Apellido</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="apellido" id="inputApellido" placeholder="Escribe tu apellido">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Escribe el correo...">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputTelefono" class="col-sm-2 col-form-label">Teléfono</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" name="telefono" id="inputTelefono" placeholder="55-5555-5555">
              </div>
            </div>
            <div class="col-auto my-10">
              <label class="mr-sm-2" for="companies">Compañía</label>
              <select class="custom-select mr-sm-2" id="companies" name="company">
                <option selected disabled>Selecciona una Compañía</option>
                @foreach ($companies as $company)
                <option value="{{$company->id}}">{{$company->nombre}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group row">
              <div class="form-check col-sm-3">
                <input class="form-check-input" type="radio" name="genero" id="masculino" value="masculino">
                <label class="form-check-label" for="masculino">
                  Masculino
                </label>
              </div>
              <div class="form-check col-sm-5">
                <input class="form-check-input" type="radio" name="genero" id="femenino" value="femenino">
                <label class="form-check-label" for="femenino">
                  Femenino
                </label>
              </div>
            </div>
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <button type="submit" class="btn btn-success">Crear Empleado</button>
          </form>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection

