<?php

include ('../../app/config.php');
include ('../../layout/sesion.php');
include ('../../layout/part1.php');

include ('../../app/controllers/reparaciones/consulta_clientes.php');

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">FORMULARIO PARA AGREGAR CLIENTES</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

      <div class="row">
        <div class="col-md-6">
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
              <h5>Datos del producto </h5>
                                      <div style="width: 20px"></div>
                                      <button type="button" class="btn btn-primary" data-toggle="modal"
                                              data-target="#modal-buscar_producto">
                                          <i class="fa fa-search"></i>
                                          Buscar producto
                                      </button>
                                      <div class="modal fade" id="modal-buscar_producto">
                                           <div class="modal-dialog modal-lg">
                                               <div class="modal-content">
                                                   <div class="modal-header" style="background-color: #1d36b6;color: white">
                                                       <h4 class="modal-title">Busqueda del producto</h4>
                                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                           <span aria-hidden="true">&times;</span>
                                                       </button>
                                                   </div>
                                                   <div class="modal-body">
                                                       <div class="table table-responsive">
                                                           <table id="example1" class="table table-bordered table-striped table-sm">
                                                               <thead>
                                                               <tr>
                                                                   <th><center>Nro</center></th>
                                                                   <th><center>Selecionar</center></th>
                                                                   <th><center>Código</center></th>
                                                                   <th><center>Categoría</center></th>
                                                                   <th><center>Imagen</center></th>
                                                                   <th><center>Nombre</center></th>
                                                               </tr>
                                                               </thead>
                                                               <tbody>
  <?php
  $contador = 0;
  foreach ($datos_clientes as $datos_cliente) {
    $cliente_id = $datos_cliente['id'];
  ?>
    <tr>
      <td><?php echo $contador = $contador + 1; ?></td>
      <td>
         
        

        <button class="btn btn-info" id="btn_selecionar<?php echo $cliente_id;?>">
            Selecionar
         </button>

         <script>
                $('#btn_selecionar<?php echo $cliente_id;?>').click(function () {

                    var id_cliente = "<?php echo $datos_cliente['id'];?>";

                 alert(id_cliente)

                  

                  
                    $('#modal-buscar_producto').modal('toggle');

                 });
         </script>



      </td>
      <td><?php echo $datos_cliente['id']; ?></td>
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

include ('../../layout/mensaje.php');
include ('../../layout/part2.php');

?>

<script>
$("#inputTelefono").mask("9999-9999");

</script>