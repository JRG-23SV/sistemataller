<?php

include('../../app/config.php');
include('../../layout/sesion.php');
include('../../layout/part1.php');

include('../../app/controllers/reparaciones/consulta_clientes.php');
include('../../app/controllers/reparaciones/consulta_estado.php');

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">FORMULARIO PARA AGREGAR REPARACIONES</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-9">
          <div class="card card-primary" style="transition: all 0.15s ease 0s; height: inherit; width: inherit;">
            <div class="card-header">
              <h3 class="card-title">Rellene los datos correctamente...</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: block;">
              <div class="row">
                <h5> Datos de clientes </h5>
                <div style="width: 20px"></div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-buscar_cliente">
                  <i class="fa fa-search"></i>
                  Buscar
                </button>
              </div>
              <hr>
              <!-- modal para visualizar datos de los proveedor -->
              <div class="modal fade" id="modal-buscar_cliente">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header" style="background-color: #1d36b6;color: white">
                      <h4 class="modal-title">Seleccione los datos de la siguiente tabla...</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="table table-responsive">
                        <table id="example1" class="table table-bordered table-striped table-sm">
                          <thead>
                            <tr>
                              <th>
                                <center>Selecionar</center>
                              </th>
                              <th>
                                <center>Cliente</center>
                              </th>
                              <th>
                                <center>Marca Vehiculo</center>
                              </th>
                              <th>
                                <center>Modelo Vehiculo</center>
                              </th>
                              <th>
                                <center>Placa Vehiculo</center>
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $contador = 0;
                            foreach ($datos_clientes as $dato_cliente) {
                              $cliente_id = $dato_cliente['id']; ?>
                              <tr>
                                <td>
                                  <center>
                                    <button class="btn btn-info" id="btn_selecionar<?php echo $cliente_id; ?>">
                                      Seleccionar
                                    </button>
                                    <script>
                                      $('#btn_selecionar<?php echo $cliente_id; ?>').click(function() {
                                        var cliente_id = "<?php echo $dato_cliente['id']; ?>";
                                        $('#cliente_id').val(cliente_id);

                                        var cliente = "<?php echo $dato_cliente['nombre']; ?> <?php echo $dato_cliente['apellido']; ?>";
                                        $('#cliente').val(cliente);

                                        var marca = "<?php echo $dato_cliente['marca_vehiculo']; ?>";
                                        $('#marca').val(marca);

                                        var modelo = "<?php echo $dato_cliente['modelo_vehiculo']; ?>";
                                        $('#modelo').val(modelo);

                                        var placa = "<?php echo $dato_cliente['placa_vehiculo']; ?>";
                                        $('#placa').val(placa);

                                        $('#modal-buscar_cliente').modal('toggle');

                                      });
                                    </script>
                                  </center>
                                </td>
                                <td>
                                  <center><?php echo $dato_cliente['nombre']; ?> <?php echo $dato_cliente['apellido']; ?></center>
                                </td>
                                <td>
                                  <center><?php echo $dato_cliente['marca_vehiculo']; ?></center>
                                </td>
                                <td>
                                  <center><?php echo $dato_cliente['modelo_vehiculo']; ?></center>
                                </td>
                                <td>
                                  <center><?php echo $dato_cliente['placa_vehiculo']; ?></center>
                                </td>
                              </tr>
                            <?php
                            }
                            ?>
                          </tbody>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>

              <div class="row">
                <div class="col-md-12">
                  <form action="../../app/controllers/reparaciones/crear_reparaciones.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <input type="text" name="id_clientes" id="cliente_id" hidden>
                          <label for="">Cliente:</label>
                          <input type="text" nombre="cliente" class="form-control" id="cliente" disabled>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="">Marca del Vehiculo:</label>
                          <div style="display: flex">
                            <input type="text" nombre="marca" class="form-control" id="marca" disabled>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="">Modelo del Vehiculo:</label>
                          <input type="text" name="modelo" id="modelo" class="form-control" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <input type="text" id="id_producto" hidden>
                          <label for="">Placa del Vehiculo:</label>
                          <input type="text" nombre="placa" class="form-control" id="placa" disabled>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="">Fecha:</label>
                          <input type="date" class="form-control" name="fecha">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="">Imagen de la falla:</label>
                          <input type="file" name="image" class="form-control" id="file">
                          <br>
                          <output id="list"></output>
                          <script>
                            function archivo(evt) {
                              var files = evt.target.files; // FileList object
                              // Obtenemos la imagen del campo "file".
                              for (var i = 0, f; f = files[i]; i++) {
                                //Solo admitimos imágenes.
                                if (!f.type.match('image.*')) {
                                  continue;
                                }
                                var reader = new FileReader();
                                reader.onload = (function(theFile) {
                                  return function(e) {
                                    // Insertamos la imagen
                                    document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e.target.result, '" width="100%" title="', escape(theFile.name), '"/>'].join('');
                                  };
                                })(f);
                                reader.readAsDataURL(f);
                              }
                            }
                            document.getElementById('file').addEventListener('change', archivo, false);
                          </script>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label for="">Descripción de la falla:</label>
                          <textarea name="falla" cols="30" rows="3" class="form-control" placeholder="Escriba la descripcion de la falla" required></textarea>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <select name="estado" id="" class="form-control" hidden>
                            <?php
                            foreach ($datos_estado as $dato_estado) {?>
                            <option value="<?php echo $dato_estado['id_est'];?>"><?php echo $dato_estado['estado'];?></option>
                            <?php 
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Guardar</button>
                      <a href="reparaciones.php" class="btn btn-secondary">Cancelar</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div>
</div><!-- /.container-fluid -->
<!-- /.content -->
<!-- /.content-wrapper -->
<?php

include('../../layout/mensaje.php');
include('../../layout/part2.php');

?>

;<script>
  $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Productos",
                "infoEmpty": "Mostrando 0 a 0 de 0 Productos",
                "infoFiltered": "(Filtrado de _MAX_ total Productos)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Productos",
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
            "responsive": true, "lengthChange": true, "autoWidth": false,

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });


    $(function () {
        $("#example2").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Proveedores",
                "infoEmpty": "Mostrando 0 a 0 de 0 Proveedores",
                "infoFiltered": "(Filtrado de _MAX_ total Proveedores)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Proveedores",
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
            "responsive": true, "lengthChange": true, "autoWidth": false,

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>