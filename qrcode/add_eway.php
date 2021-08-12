<?php

/**
 *  EWAY APP - Códigos QR personalizados
 *
 * @author    Víctor Córdoba <hola@victorcordoba.com>
 * @copyright Copyright (c) 2021
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/victorcordobac/dynamic_qr
 * @version   3.0
 */




session_start();
require_once 'config/config.php';
require_once BASE_PATH . '/includes/auth_validate.php';

// Dynamic qrcode class
require_once BASE_PATH . '/lib/Dynamic_Qrcode/Dynamic_Qrcode.php';
$dynamic_qrcode = new Dynamic_Qrcode();

$num_used_for = 1; //nº de campos USADO EN

$edit = false; //no se está editando

// Serve POST method, After successful insert, redirect to eways.php page.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num_used_for = $_POST['num_fields']; //pasar por post el número de campos que tiene
    $dynamic_qrcode->add(); //FUNCIÓN DE AÑADIR
}

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <title>NUEVO EWAY - Expression Way</title>
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
                            <h1 class="m-0 text-dark">NUEVO EWAY</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Flash messages -->
            <?php include BASE_PATH . '/includes/flash_messages.php'; ?>
            <!-- /.Flash messages -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Rellena los siguientes campos</h3>
                        </div>
                        <form class="form" action="" method="post" id="dynamic_form" enctype="multipart/form-data">
                            <div class="card-body pb-0">
                                <!--FORMULARIO-->
                                <?php include BASE_PATH . '/forms/renacimiento/add_eway_form.php'; ?>
                                <!--FORMULARIO-->
                            </div>
                            <div class="card-footer mx-auto text-center">
                                <button type="submit"
                                    class="btn btn-lg btn-primary text-center font-weight-bold text-uppercase text-lg"
                                    id="actualizar"><i class="fas fa-plus-square mr-2"></i>CREAR</button>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
                <!--/. container-fluid -->
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
        <?php include BASE_PATH . '/forms/used_for_template.php'; // TEMPLATE DE SOPORTES 
        ?>
        <!-- Footer and scripts -->
        <?php include './includes/footer.php'; ?>


        <!-- SCRIPTS -->
        <script type="text/javascript">
        $(document).ready(function() {
            //AÑADIR SOPORTES
            let i = 1;
            $('#add_more').on('click', function() {
                i++;
                let template_id = $(this).data('template');
                let append_id = $(this).data('append');
                let _template = $("#" + template_id).html();
                $('#' + append_id).append(_template);
                $('#num_fields').val(i);
            });
            //ELIMINAR SOPORTES
            $('body').on('click', '.remove', function() {
                $(this).closest('.del-row').remove();
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
        <!--SCRIPT DEL COLOR PICKER - aunque está oculto-->
        <script>
        $(function() {

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function(event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            });

        })
        </script>
</body>

</html>