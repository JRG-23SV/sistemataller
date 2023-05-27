<?php

include ('../../app/config.php');
include ('../../layout/sesion.php');
include ('../../layout/part1.2.php');
include('../../app/controllers/usuarios/listado_users.php');

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">LISTADO DE USUARIOS</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid"> 
      <hr>
            <div class="card card-outline card-primary" style="transition: all 0.15s ease 0s; height: inherit; width: inherit;">
              <div class="card-header">
                <h3 class="card-title">Aqui se muestran los datos de los usuarios...</h3>

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
                    <th>No.</th>
                    <th>Nombre del Usuario</th>
                    <th>Correo Electronico</th>
                    <th>Cargo</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $contador = 0;
                    foreach($datos_usuarios as $dato_usuarios){ 
                      $usuarios_id = $dato_usuarios['id_usuario']; ?>
                    <tr>
                      <td><?php echo $contador = $contador + 1;?></td>
                      <td><?php echo $dato_usuarios['username'];?></td>
                      <td><?php echo $dato_usuarios['correo'];?></td>
                      <td><center><?php echo $dato_usuarios['rol'];?></center></td>
                      <td>
                        <center>
                        <div class="btn-group">
                          <a href="mostrar2.php?id=<?php echo $usuarios_id; ?>" type="button" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                        </div>
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

include ('../../layout/mensaje.php');
include ('../../layout/part2.php');?>

<script>
  $(function () {
    $("#example1").DataTable({
      "pageLength": 5,
      "language": {
              "emptyTable": "No hay información",
              "decimal": "",
              "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
              "infoEmpty": "Mostrando 0 to 0 of 0 Usuarios",
              "infoFiltered": "(Filtrado de _MAX_ total Usuarios)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar _MENU_ Usuarios",
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
      buttons:  [{
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
			}
			]
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

