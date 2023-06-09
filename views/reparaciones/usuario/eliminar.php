<?php

include('../../../app/config.php');
include('../../../layout/sesion.php');
include('../../../layout/part1.2.php');

include('../../../app/controllers/reparaciones/usuario/consulta_clientes.php');
include('../../../app/controllers/reparaciones/usuario/mostrar_reparaciones.php');

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ELIMINANDO REPARACION</h1>
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
                    <div class="card card-danger" style="transition: all 0.15s ease 0s; height: inherit; width: inherit;">
                        <div class="card-header">
                            <h3 class="card-title">¿Esta seguro de eliminarl la siguiente reparacion?</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="display: block;">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="../../../app/controllers/reparaciones/usuario/eliminar_reparacion.php" method="post">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" name="id_reparaciones" id="" value="<?php echo $idrep; ?>" hidden>
                                                    <input type="text" name="id_clientes" id="cliente_id" hidden>
                                                    <label for="">Cliente:</label>
                                                    <input type="text" name="cliente" class="form-control" value="<?php echo $nombre ?> <?php echo $apellido ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Marca del Vehiculo:</label>
                                                    <div style="display: flex">
                                                        <input type="text" name="marca" class="form-control" value="<?php echo $marca ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Modelo del Vehiculo:</label>
                                                    <input type="text" name="modelo" class="form-control" value="<?php echo $modelo ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" id="id_producto" hidden>
                                                    <label for="">Placa del Vehiculo:</label>
                                                    <input type="text" name="placa" class="form-control" value="<?php echo $placa ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Fecha:</label>
                                                    <input type="date" class="form-control" name="fecha" value="<?php echo $fecharep ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Imagen de la falla:</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="">Descripción de la falla:</label>
                                                    <textarea name="falla" cols="30" rows="3" class="form-control" disabled><?php echo $fallarep ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <center>
                                                        <img src="<?php echo $URL . "/views/reparaciones/img_reparaciones/" . $dato_reparaciones['imagen']; ?>" width="100%" height="100%" alt="asdf">
                                                    </center>
                                                    <select name="estado" id="" class="form-control" hidden>
                                                        <?php
                                                        foreach ($datos_estado as $dato_estado) { ?>
                                                            <option value="<?php echo $dato_estado['id_est']; ?>"><?php echo $dato_estado['estado']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                            <a href="reparaciones.php" class="btn btn-secondary">Regresar</a>
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

include('../../../layout/mensaje.php');
include('../../../layout/part2.php');

?>

;<script>
    $(function() {
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
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });


    $(function() {
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
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>