@extends('layouts.plantilla')
@section('title', 'Create Company')


@section('content')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editar Compañía
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box" style="max-width: 720px;">
        <div class="box-header with-border">
          <h3 class="box-title">Escribe los datos de la compañía.</h3>

        </div>
        <div class="box-body">
          <form id="formulario" method="POST" action="{{route('companies.update',$company)}}" enctype="multipart/form-data">
            @csrf
            @method('put')


            <div class="form-group row">
              <label for="inputNombre" class="col-sm-2 col-form-label">Nombre</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nombre" id="inputNombre" placeholder="Escribe el nombre..." value="{{$company->nombre}}">
                @error('nombre')
                    <small>*{{$message}}</small>
                  <br>
                @enderror
              </div>
            </div>


            <div class="form-group row">
              <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Escribe el correo..." value="{{$company->email}}">
                @error('email')
                    <small>*{{$message}}</small>
                  <br>
                @enderror
              </div>
            </div>


            <div class="form-group">
              <p>Imagen Actual: {{$company->logo}} </p>
              <label for="logo">Selecciona otro logo o deja el actual.</label>
              <input type="file" class="form-control-file" id="logo" name="logo">
            </div>


            <div class="form-group row">
              <label for="inputWebSite" class="col-sm-2 col-form-label">WebSite</label>
              <div class="col-sm-10">
                <input type="url" class="form-control" name="website" id="inputWebSite" placeholder="http://example.com" value="{{$company->website}}">
                @error('website')
                    <small>*{{$message}}</small>
                  <br>
                @enderror
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

