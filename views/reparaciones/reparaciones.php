<?php

include('../../app/config.php');
include('../../layout/sesion.php');
include('../../layout/part1.php');
include('../../app/controllers/reparaciones/listado_reparaciones.php');
include('../../app/controllers/reparaciones/consulta_estado.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">LISTADO DE REPARACIONES</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">

      <a href="crear.php" class="btn btn-primary">
        <h5>Nueva Reparacion</h5>
      </a>
      <hr>
      <div class="card card-outline card-primary" style="transition: all 0.15s ease 0s; height: inherit; width: inherit;">
        <div class="card-header">
          <h3 class="card-title">Aqui se muestran los datos de los reparaciones...</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
            </button>
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="display: block;">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Cliente</th>
                <th>Marca Vehiculo</th>
                <th>Modelo Vehiculo</th>
                <th>Placas</th>
                <th>Fallas</th>
                <th>Fecha Ingreso</th>
                <th>Imagen</th>
                <th>Estado</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $contador = 0;
              foreach ($datos_reparaciones as $dato_reparaciones) {
                $reparaciones_id = $dato_reparaciones['id_rep']; ?>
                <tr>

                  <td><?php echo $dato_reparaciones['nombre']; ?> <?php echo $dato_reparaciones['apellido']; ?></td>
                  <td><?php echo $dato_reparaciones['marca_vehiculo']; ?></td>
                  <td><?php echo $dato_reparaciones['modelo_vehiculo']; ?></td>
                  <td><?php echo $dato_reparaciones['placa_vehiculo']; ?></td>
                  <td><?php echo $dato_reparaciones['fallas']; ?></td>
                  <td><?php echo $dato_reparaciones['fecha_ingreso']; ?></td>
                  <td>
                    <center>
                      <img src="<?php echo $URL . "/views/reparaciones/img_reparaciones/" . $dato_reparaciones['imagen']; ?>" width="150px" height="100px" alt="asdf">
                    </center>
                  </td>
                  <td>
                    <?php
                    if ($dato_reparaciones['estado'] == "Inactivo") {
                    ?>
                      <center>
                        <button class="btn btn-secondary"><?php echo $dato_reparaciones['estado']; ?></button>
                      </center>
                    <?php
                    } else if ($dato_reparaciones['estado'] == "En proceso") {
                    ?>
                      <center>
                        <button class="btn btn-info"><?php echo $dato_reparaciones['estado']; ?></button>
                      </center>
                    <?php
                    } else {
                    ?>
                      <center>
                        <button class="btn btn-success"><?php echo $dato_reparaciones['estado']; ?></button>
                      </center>
                    <?php
                    }
                    ?>
                    <hr>
                    <center>
                      <button class="btn" data-toggle="modal" data-target="#modal-cambiar-estado<?php echo $reparaciones_id; ?>"><i class="fa-solid fa-repeat fa-spin"></i></button>

                      <div class="modal fade" id="modal-cambiar-estado<?php echo $reparaciones_id; ?>">
                        <div class="modal-dialog modal-xs">
                          <div class="modal-content modal-primary">
                            <div class="modal-header">
                              <h4 class="modal-title">Cambiar estado...</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="../../app/controllers/reparaciones/cambiar_estado.php" method="post">
                                <input type="text" name="id_repara" id="repara_id" value="<?php echo $reparaciones_id; ?>" hidden>
                                <select name="estado_reparacion" id="" class="form-control">
                                  <?php
                                  foreach ($datos_estado as $dato_estado) {
                                    $tabla_estado = $dato_estado['estado'];
                                    $id_estado = $dato_estado['id_est'];
                                  ?>
                                    <option value="<?php echo $id_estado; ?>" <?php if ($tabla_estado == $dato_reparaciones['estado']) { ?> selected="selected" <?php } ?> style="font-size: large; width: 200px; padding: 5px;">
                                      <?php echo $tabla_estado; ?>
                                    </option>
                                  <?php
                                  }
                                  ?>
                                </select>
                                <hr>
                                <button type="submit" class="btn btn-secondary">CAMBIAR</button>
                              </form>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                    </center>
                  </td>
                  <td>
                    <center>
                      <div class="btn-group">
                        <a href="mostrar.php?id=<?php echo $reparaciones_id; ?>" type="button" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                        <a href="modificar.php?id=<?php echo $reparaciones_id; ?>" type="button" class="btn btn-success"><i class="fa fa-pencil-alt"></i> </a>
                        <a href="eliminar.php?id=<?php echo $reparaciones_id; ?>" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                      </div>
                      <hr>
                      <?php
                      if ($dato_reparaciones['estado'] == "Inactivo") {
                      ?>
                        <a href="#" type="button" class="btn btn-secondary"><i class="fa-sharp fa-solid fa-cash-register"></i> Generar Factura</a>
                      <?php
                      } else if ($dato_reparaciones['estado'] == "En proceso") {
                      ?>
                        <a href="#" type="button" class="btn btn-secondary"><i class="fa-sharp fa-solid fa-cash-register"></i> Generar Factura</a>
                      <?php
                      } else {
                      ?>
                        <a href="" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-generar-factura<?php echo $reparaciones_id; ?>"><i class="fa-sharp fa-solid fa-cash-register"></i> Generar Factura</a>

                        <div class="modal fade" id="modal-generar-factura<?php echo $reparaciones_id; ?>">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content modal-primary">
                              <div class="modal-header" style="background-color: #007bff;color: white;">
                                <h4 class="modal-title">Creando factura</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="../../app/controllers/facturacion/crear_factura.php" method="post">
                                  <div class="row">
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <input type="text" name="id_repara" id="repara_id" value="<?php echo $reparaciones_id; ?>" hidden>
                                        <input type="text" name="marcavehi" id="marcavehi" value="<?php echo $dato_reparaciones['marca_vehiculo']; ?>" hidden>
                                        <input type="text" name="modelovehi" id="modelovehi" value="<?php echo $dato_reparaciones['modelo_vehiculo']; ?>" hidden>
                                        <input type="text" name="placavehi" id="placavehi" value="<?php echo $dato_reparaciones['placa_vehiculo']; ?>" hidden>
                                        <input type="text" name="teleclient" id="teleclient" value="<?php echo $dato_reparaciones['telefono']; ?>" hidden>
                                        <label for="">Cliente:</label>
                                        <input type="text" name="clientefact" id="clientefact" class="form-control" value="<?php echo $dato_reparaciones['nombre']; ?> <?php echo $dato_reparaciones['apellido']; ?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-md-8">
                                      <div class="form-group">
                                        <label for="">Descripcion de la reparacion:</label>
                                        <textarea name="repdescrip" cols="30" rows="3" class="form-control" placeholder="Describa la reparacion realizada"></textarea>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <br>
                                        <label for="">Fecha de reparación:</label>
                                        <input type="date" class="form-control" name="fechafact">
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <br>
                                        <label for="" style="text-align: right;padding-left: 80px;">Gastos en repuestos: $</label>
                                      </div>
                                      <div class="form-group">
                                        <br>
                                        <label for="">Monto a pagar por la reparación: $</label>
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <br>
                                        <input type="text" name="gastorep" id="monto" class="form-control">
                                      </div>
                                      <div class="form-group">
                                        <br>
                                        <input type="text" name="montorep" id="monto" class="form-control">
                                      </div>
                                    </div>
                                  </div>
                                  <hr>
                                  <button type="submit" class="btn btn-primary">CREAR</button>
                                  <a href="reparaciones.php" type="button" class="btn btn-secondary">REGRESAR</a>
                                </form>
                              </div>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                      <?php
                      }
                      ?>
                    </center>
                  </td>
                </tr>

              <?php

              }

              ?>
            </tbody>

          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php

include('../../layout/mensaje.php');
include('../../layout/part2.php'); ?>

<script>
  $(function() {
    $("#example1").DataTable({
      "pageLength": 5,
      "language": {
        "emptyTable": "No hay información",
        "decimal": "",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ reparaciones",
        "infoEmpty": "Mostrando 0 to 0 of 0 reparaciones",
        "infoFiltered": "(Filtrado de _MAX_ total reparaciones)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ reparaciones",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscador:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
          "first": "Primero",
          "last": "Ultimo",
          "next": "Siguiente",
          "previous": "Anterior"
        }
      },
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      buttons: [{
          extend: 'collection',
          text: 'Reportes',
          orientation: 'landscape',
          buttons: [{
            text: 'Copiar',
            extend: 'copy'
          }, {
            extend: 'pdf'
          }, {
            extend: 'csv'
          }, {
            extend: 'excel'
          }, {
            text: 'Imprimir',
            extend: 'print'
          }]
        },
        {
          extend: 'colvis',
          text: 'Mostrar / Ocultar columnas',
          collectionLayout: 'fixed three-column'
        }
      ],
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>