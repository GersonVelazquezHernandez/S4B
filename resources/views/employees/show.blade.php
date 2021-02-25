@extends('layouts.plantilla')
@section('title', 'Editar Empleado')


@section('content')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editar Empleado
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
          <form id="formulario" method="POST" action="{{route('employees.update',$employee)}}" enctype="multipart/form-data">
            @csrf
            @method('put')


            <div class="form-group row">
              <label for="inputNombre" class="col-sm-2 col-form-label">Nombre</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nombre" id="inputNombre" placeholder="Escribe el nombre..." value="{{$employee->first_name}}">
                @error('nombre')
                    <small>*{{$message}}</small>
                  <br>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="inputApellido" class="col-sm-2 col-form-label">Apellido</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="apellido" id="inputApellido" placeholder="Escribe el apellido..." value="{{$employee->last_name}}">
                @error('apellido')
                    <small>*{{$message}}</small>
                  <br>
                @enderror
              </div>
            </div>


            <div class="form-group row">
              <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Escribe el correo..." value="{{$employee->email}}">
                @error('email')
                    <small>*{{$message}}</small>
                  <br>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="inputTelefono" class="col-sm-2 col-form-label">Telefono</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="telefono" id="inputTelefono" placeholder="Escribe el telefono..." value="{{$employee->telefono}}">
                @error('telefono')
                    <small>*{{$message}}</small>
                  <br>
                @enderror
              </div>
            </div>

            <div class="col-auto my-10">
              <label class="mr-sm-2" for="companies">Compañía</label>
              <select class="custom-select mr-sm-2" id="companies" name="company">
                @foreach ($companies as $company)
                @if ($company->id === $employee->company_id)
                <option selected value="{{$company->id}}">{{$company->nombre}}</option> 
                @endif
                <option value="{{$company->id}}">{{$company->nombre}}</option>
                @endforeach
              </select>
            </div>


            <div class="form-group row">
              <div class="form-check col-sm-3">
                @if ($employee->genero === "masculino")
                <input class="form-check-input" type="radio" name="genero" id="masculino" value="masculino" checked>                    
                @else
                <input class="form-check-input" type="radio" name="genero" id="masculino" value="masculino">                     
                @endif
                <label class="form-check-label" for="masculino">
                  Masculino
                </label>
              </div>
              <div class="form-check col-sm-5">
                @if ($employee->genero === "femenino")
                <input class="form-check-input" type="radio" name="genero" id="femenino" value="femenino" checked>
                @else
                <input class="form-check-input" type="radio" name="genero" id="femenino" value="femenino">
                @endif
                <label class="form-check-label" for="femenino">
                  Femenino
                </label>
              </div>
            </div>


            <meta name="csrf-token" content="{{ csrf_token() }}">
            <button type="submit" class="btn btn-success">Actualizar Compañía</button>
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

