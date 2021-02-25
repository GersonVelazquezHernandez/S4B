@extends('layouts.plantilla')
@section('title', 'Crear Empleado')


@section('content')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administra tus Empleados
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Empleados</h3>

        </div>
        <div class="box-body">
          <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">Género</th>
                <th scope="col">Nombre</th>
                <th scope="col">Compañía</th>
                <th scope="col">Email</th>
                <th scope="col">Teléfono</th>
              </tr>
            </thead>
            <tbody>
              @csrf
              @foreach ($employees as $employee)
              <tr>
                <th scope="row">
                    @if ($employee->genero === "masculino")
                    <i class="fa fa-male fa-3x"></i>
                    @else
                    <i class="fa fa-female fa-3x"></i>
                    @endif
                </th>
                <td>{{$employee->first_name.' '.$employee->last_name}}</td>
                <td>
                    @foreach ($companies as $company)
                        @if ($company->id === $employee->company_id)
                        {{$company->nombre}}
                        @endif
                    @endforeach
                </td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->telefono}}</td>
                <td>
                  <a href="<?php echo url('/employees')."/".$employee->id;?>" class="pull-left btn btn-warning btn-lg"><i class="fa fa-pencil"></i></a>
                  <button id="{{$employee->id}}" class="pull-right btn btn-danger btn-lg btn-borrar"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
        
        <div class="box-footer">
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
  @section('ajax')
  <script src="<?php echo url('../resources/js/ajax_employees.js');?>"></script>
  @endsection
