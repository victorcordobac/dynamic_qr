<?php
/**
* PHP Dynamic Qr code
*
* @author    Giandonato Inverso <info@giandonatoinverso.it>
* @copyright Copyright (c) 2020-2021
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://github.com/giandonatoinverso/PHP-Dynamic-Qr-code
* @version   1.0
*/

session_start();
require_once 'config/config.php';
require_once BASE_PATH.'/includes/auth_validate.php';

// Dynamic qrcode class
require_once BASE_PATH . '/lib/Dynamic_Qrcode/Dynamic_Qrcode.php';
$dynamic_qrcode = new Dynamic_Qrcode();

$dynamic_id = htmlspecialchars($_GET['dynamic_id'], ENT_QUOTES, 'UTF-8');
$operation = htmlspecialchars($_GET['operation'], ENT_QUOTES, 'UTF-8');
($operation == 'edit') ? $edit = true : $edit = false;
$db = getDbInstance();

// Handle update request. As the form's action attribute is set to the same script, but 'POST' method,
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dynamic_qrcode->edit();
}
$num_used_for = 1;
// If edit variable is set, we are performing the update operation.
if ($edit) {
    $db->where('id', $dynamic_id);
    // Get data to pre-populate the form.
    $dynamic_qrcode = $db->getOne('dynamic_qrcodes');
    $used_for = null;
    if (strlen($dynamic_qrcode['used_for'])) {
        $used_for = explode(',', $dynamic_qrcode['used_for']);
        $num_used_for = count($used_for);
    }
    
    $db->where('qr_id', $dynamic_id);
    $history_qr = $db->objectBuilder()->orderBy('id', 'desc')->get('dynamic_qr_version');
}
?>
<!DOCTYPE html>
<html lang="en">
    <title>Editar QR dinámico - Expression Way</title>
    <head>
    <?php include './includes/head.php'; ?>
    </head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <?php include './includes/navbar.php'; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include './includes/sidebar.php'; ?>
  <!-- /.Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">CÓDIGO QR</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Flash messages -->
    <?php include BASE_PATH.'/includes/flash_messages.php'; ?>
    <!-- /.Flash messages -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">EDITAR</h3>
                </div>
                <form class="form" action="" method="post" id="dynamic_form" enctype="multipart/form-data">
                    <div class="card-body">
                        <!--FORMULARIO-->
                        <?php include BASE_PATH.'/forms/edit_dynamic_form.php'; ?>
                        <!--FORMULARIO-->
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" id="actualizar">Actualizar</button>
                    </div>
                </form>
            </div>

            <!--LISTADO HISTÓRICO-->
            <?php include BASE_PATH.'/forms/renacimiento/partes/history_table.php'; ?>
            

        </div><!--/. container-fluid -->
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Historial</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<?php include BASE_PATH.'/forms/used_for_template.php'; ?>
<!-- Footer and scripts -->
<?php include './includes/footer.php'; ?>

<!-- DEPENDENCIAS PARA EL BOOTSTRAP BUTTON -->
<link href="plugins/bootstrap-switch/css/bootstrap3/bootstrap-switch.css" rel="stylesheet">
<script src="plugins/bootstrap-switch/js/bootstrap-switch.js"></script>

<!-- SCRIPTS -->
<script type="text/javascript">

$(document).ready(function(){
    let i = 1;
    //AÑADIR SOPORTES
    $('#add_more').on('click',function(){
        i++;
        let template_id = $(this).data('template');
        let append_id = $(this).data('append');
        let _template = $("#"+template_id).html();
        $('#'+append_id).append(_template);
        $('#num_fields').val(i);
    });
    //eliminar SOPORTES
   $('body').on('click','.remove',function(){
        $(this).closest('.del-row').remove();
   });
   //SACAR MODAL
   $('#exampleModal').on('show.bs.modal', function (e) {
    let btn = $(e.relatedTarget);
    $(this).find('.modal-body').load(btn.data('remote'));
  });

    //INICIALIZAR SWITCH
    $("[name='state']").bootstrapSwitch();
    //CONVERTIR VALOR DEL SWITCH
    $('#actualizar').on('click', function () {
        var activado = '';

        if ($('#interruptor').is(':checked')) {
            $activado = $('#interruptor').attr('value', 'enable');           
        }
        else {
            $activado = $('#interruptor').attr('value', 'disable');         
        }        
    });
    
    
    //VALIDACIÓN
   $('#dynamic_form').validate({
       rules: {
            filename: {
                required: true,
            },
            link: {
                required: true,
                minlength: 3
            },   
        }
    });
});
</script>
</body>
</html>
