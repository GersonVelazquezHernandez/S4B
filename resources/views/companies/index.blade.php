@extends('layouts.plantilla')
@section('title', 'Create Company')


@section('content')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administra tus Compañías
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Compañías</h3>

        </div>
        <div class="box-body">
          <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">Logo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">WebSite</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @csrf
              @foreach ($companies as $company)
              <tr>
                <th scope="row"><img src="http://localhost/S4B/public/storage/logos/{{$company->logo}}" style="height: 5rem" alt="Responsive image">
                </th>
                <td>{{$company->nombre}}</td>
                <td>{{$company->email}}</td>
                <td>{{$company->website}}</td>
                <td>
                  <a href="<?php echo url('/companies')."/".$company->id;?>" class="pull-left btn btn-warning btn-lg"><i class="fa fa-pencil"></i></a>
                  <button id="{{$company->id}}" class="pull-right btn btn-danger btn-lg btn-borrar"><i class="fa fa-trash"></i></button></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
        
        <div class="box-footer">
          {{$companies->links()}}
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
  <script src="<?php echo url('../resources/js/ajax_companies.js');?>"></script>
  @endsection
