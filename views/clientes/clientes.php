<?php

include ('../../app/config.php');
include ('../../layout/sesion.php');
include ('../../layout/part1.php');
include('../../app/controllers/clientes/listado_clientes.php');

?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">LISTADO DE CLIENTES</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

        <a href="crear.php" class="btn btn-primary"><h5>Agregar Cliente</h5></a>
        <hr>
            <div class="card card-outline card-primary" style="transition: all 0.15s ease 0s; height: inherit; width: inherit;">
                <div class="card-header">
                <h3 class="card-title">Aqui se muestran los clientes agregados...</h3>

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
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Marca del Vehiculo</th>
                    <th>Modelo del Vehiculo</th>
                    <th>Placa del Vehiculo</th>
                    <th>Telefono</th>
                    <th>Fecha de Registro</th>
                    <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $contador = 0;
                    foreach($datos_clientes as $dato_cliente){ 
                        $clientes_id = $dato_cliente['id'];?>
                    <tr>
                        <td><?php echo $contador = $contador + 1;?></td>
                        <td><?php echo $dato_cliente['nombre'];?></td>
                        <td><?php echo $dato_cliente['apellido'];?></td>
                        <td><?php echo $dato_cliente['marca_vehiculo'];?></td>
                        <td><?php echo $dato_cliente['modelo_vehiculo'];?></td>
                        <td><?php echo $dato_cliente['placa_vehiculo'];?></td>
                        <td><?php echo $dato_cliente['telefono'];?></td>
                        <td><?php echo $dato_cliente['fecha_registro'];?></td>
                        <td>
                            <center>
                                <div class="btn-group">
                                <a href="mostrar.php?id=<?php echo $clientes_id; ?>" type="button" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                                <a href="modificar.php?id=<?php echo $clientes_id; ?>" type="button" class="btn btn-success"><i class="fa fa-pencil-alt"></i> </a>
                                <a href="eliminar.php?id=<?php echo $clientes_id; ?>" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Clientes",
                "infoEmpty": "Mostrando 0 to 0 of 0 Clientes",
                "infoFiltered": "(Filtrado de _MAX_ total Clientes)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Clientes",
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

