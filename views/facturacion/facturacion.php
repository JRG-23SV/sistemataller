<?php

include('../../app/config.php');
include('../../layout/sesion.php');
include('../../layout/part1.php');
include('../../app/controllers/facturacion/listado_facturacion.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">LISTADO DE PAGOS</h1>
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
                    <h3 class="card-title">Aqui los pagos de las reparaciones...</h3>

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
                                <th>Fecha de reparacion</th>
                                <th>Cliente</th>
                                <th>Descripcion de la reparacion</th>
                                <th>Monto a pagar</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($datos_pagos as $dato_pagos) {
                                $pagos_id = $dato_pagos['id_factura']; ?>
                                <tr>
                                    <td><?php echo $dato_pagos['fecha_reparacion']; ?></td>
                                    <td><?php echo $dato_pagos['cliente']; ?></td>
                                    <td><?php echo $dato_pagos['descripcionrepa']; ?></td>
                                    <td>$<?php echo $dato_pagos['pagototal']; ?></td>
                                    <td>
                                        <center>
                                            <div class="btn-group">
                                                <a href="ticket/ticket.php?id=<?php echo $pagos_id; ?>" type="button" class="btn btn-primary" target="_blank"><i class="fa-sharp fa-solid fa-money-check-dollar"></i> Generar Ticket</a>
                                            </div>
                                            <div class="btn-group">
                                                <a href="factura/factura.php?id=<?php echo $pagos_id; ?>" type="button" class="btn btn-success" target="_blank"><i class="fa-sharp fa-solid fa-sheet-plastic"></i> Generar Factura</a>
                                            </div>
                                            <div class="btn-group">
                                                <a href="" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-borrar-pago<?php echo $pagos_id; ?>"><i class="fa fa-trash"></i></a>
                                            </div>
                                            <div class="modal fade" id="modal-borrar-pago<?php echo $pagos_id; ?>">
                                            <div class="modal-dialog modal-s">
                                                <div class="modal-content modal-primary">
                                                    <div class="modal-header" style="background-color: #dc3545;color: white;">
                                                        <h4 class="modal-title">Borrando datos de pago</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="../../app/controllers/facturacion/eliminar_facturacion.php" method="post">
                                                            <h2>¿Desea borrar el pago?</h2>
                                                            <hr>
                                                            <input name="id_pago" value="<?php echo $pagos_id; ?>" hidden>
                                                            <button type="submit" class="btn btn-danger">ELIMINAR</button>
                                                            <a href="facturacion.php" type="button" class="btn btn-secondary">REGRESAR</a>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
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

include('../../layout/mensaje.php');
include('../../layout/part2.php'); ?>

<script>
    $(function() {
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