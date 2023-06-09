<?php

include('app/config.php');
include('layout/sesion.php');
include('layout/part1.php');
include('app/controllers/usuarios/listado_users.php');
include('app/controllers/clientes/listado_clientes.php');
include('app/controllers/reparaciones/listado_reparaciones.php');
include('app/controllers/facturacion/listado_facturacion.php');

if (isset($_SESSION['mensajebien'])) {
  $uuuuser = $_SESSION['mensajebien']; ?>
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Bienvenido <br> <?php echo $uuuuser ?>',
      showConfirmButton: false,
      timer: 1500
    })
  </script>
<?php
  unset($_SESSION['mensajebien']);
}
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">MENU DE INICIO</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <?php
              $contador_usuarios = 0;
              foreach ($datos_usuarios as $usuario_dato) {
                $contador_usuarios = $contador_usuarios + 1;
              }
              ?>
              <h3><?php echo $contador_usuarios; ?></h3>
              <p>
              <h4>Usuarios Registrados</h4>
              </p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-address-book"></i>
            </div>
            <a href="<?php echo $URL ?>/views/usuarios/usuarios.php" class="small-box-footer">Mas detalles <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <?php
              $contador_reparaciones = 0;
              foreach ($datos_clientes as $cliente_dato) {
                $contador_reparaciones = $contador_reparaciones + 1;
              }
              ?>
              <h3><?php echo $contador_reparaciones; ?></h3>
              <p>
              <h4>Clientes Registrados</h4>
              </p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-users"></i>
            </div>
            <a href="<?php echo $URL ?>/views/clientes/clientes.php" class="small-box-footer">Mas detalles <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <?php
              $contador_reparaciones = 0;
              foreach ($datos_reparaciones as $reparacion_dato) {
                $contador_reparaciones = $contador_reparaciones + 1;
              }
              ?>
              <h3><?php echo $contador_reparaciones; ?></h3>
              <p>
              <h4>Reparaciones</h4>
              </p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-screwdriver-wrench"></i>
            </div>
            <a href="<?php echo $URL ?>/views/reparaciones/reparaciones.php" class="small-box-footer">Mas detalles <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-teal">
            <div class="inner">
              <?php
              $contador_facturacion = 0;
              foreach ($datos_pagos as $pagos_dato) {
                $contador_facturacion = $contador_facturacion + 1;
              }
              ?>
              <h3><?php echo $contador_facturacion; ?></h3>
              <p>
              <h4>Facturación</h4>
              </p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-hand-holding-dollar"></i>
            </div>
            <a href="<?php echo $URL ?>/views/facturacion/facturacion.php" class="small-box-footer">Mas detalles <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <div class="row">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Grafica de clientes</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body" style="display: block;">
            <div class="chart">
              <div class="chartjs-size-monitor">
                <div class="chartjs-size-monitor-expand">
                  <div class=""></div>
                </div>
                <div class="chartjs-size-monitor-shrink">
                  <div class=""></div>
                </div>
              </div>
              <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block;" width="486" height="250" class="chartjs-render-monitor"></canvas>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php

include('layout/part2.php');
include('layout/mensaje.php');

?>

<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')


    var areaChartData = {
      labels  : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
      datasets: [
        {
          label               : 'Nuevos Clientes',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90, 80, 70, 60, 80, 90]
        }
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, areaChartOptions)
    var lineChartData = $.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Chrome',
          'IE',
          'FireFox',
          'Safari',
          'Opera',
          'Navigator',
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  })
</script>