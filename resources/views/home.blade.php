@extends('layouts.plantilla')
@section('title', 'Home')


@section('content')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Bienvenido
        <small>{{session('user')}}</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Empleados en compañias</h3>

        </div>
        <div class="box-body">
          <canvas id="canvas" width="350" height="200"></canvas>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Muestra los empleados que estan registrados en una compañía.
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
  <script type="text/javascript">
  let empresa = [], conteo = [];
  @foreach (json_decode($empresas) as $empresa)
    empresa.push('{{$empresa}}');
  @endforeach
  @foreach (json_decode($total) as $tot)
    conteo.push({{$tot}});
  @endforeach
  console.log(empresa,conteo);
  var ctx = document.getElementById("canvas").getContext("2d");
  var data = {
   labels: empresa,
   datasets: [{
      label: "# of votes",
      fillColor: "#00FF93",
      data: conteo
   }]
  };
  var myBarChart = new Chart(ctx).Bar(data, {
   scaleBeginAtZero: true
});
</script>
  @endsection