<?php
session_start();
require_once 'config/config.php';

$profile_data = new stdClass;

if (key_exists('temp_user_id', $_SESSION)) {
    $db = getDbInstance();
    $db->where('id', $_SESSION['temp_user_id']);
    $profile_data = $db->objectBuilder()->getOne('temp_accounts');
}


$edit = false;

// Serve POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Users class
    require_once BASE_PATH . '/lib/Users/Profile.php';
    $profile = new Profile();
    $profile->add();
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>REGISTRO - Expression Way</title>
    <?php include './includes/head.php'; ?>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css'
        integrity='sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=='
        crossorigin='anonymous' />
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-no">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">REGISTRO</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Flash messages -->
                    <?php include BASE_PATH . '/includes/flash_messages.php'; ?>

                    <div class="card card-primary mb-5">
                        <div class="card-header">
                            <h3 class="card-title">Completa los siguientes campos</h3>
                        </div>
                        <form class="well form-horizontal" action="" method="post" id="contact_form"
                            enctype="multipart/form-data">
                            <div class="card-body">
                                <?php include BASE_PATH . '/forms/create_user_profile_form.php'; ?>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Registrarme</button>
                            </div>
                        </form>
                    </div>

                </div>
                <!--/. container-fluid -->
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

        <!-- Footer and scripts -->
        <?php include './includes/footer.php'; ?>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js'
            integrity='sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=='
            crossorigin='anonymous'></script>
        <!-- Page script -->
        <script>
        //CAREMLO EDITAR VARIABLES DROPIFY
        $('.dropify').dropify({
            messages: {
                'default': 'Arrastra aquí una foto o haz click para buscarla',
                'replace': 'Arrastra o haz click para cambiar la foto',
                'remove': 'Eliminar',
                'error': 'Vaya, algo ha ido mal'
            },
            tpl: {
                wrap: '<div class="dropify-wrapper"></div>',
                loader: '<div class="dropify-loader"></div>',
                message: '<div class="dropify-message"><span class="file-icon" /> <p style="font-size:0.5em">{{ default }}</p></div>',
                preview: '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">{{ replace }}</p></div></div></div>',
                filename: '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
                clearButton: '<button type="button" class="dropify-clear">{{ remove }}</button>',
                errorLine: '<p class="dropify-error">{{ error }}</p>',
                errorsContainer: '<div class="dropify-errors-container"><ul></ul></div>'
            }
        });
        //fin CAREMLO EDITAR VARIABLES DROPIFY
        $(function() {
            let drEvent = $('.dropify').dropify();
            drEvent.on('dropify.beforeClear', function(event, element) {
                if (confirm("¿Seguro que quieres eliminar \"" + element.file.name + "\" ?")) {
                    $.post("ajax_remove_img.php", {
                                profile_pic: element.file.name
                            },
                            function(data, textStatus, jqXHR) {
                                alert(data.message);
                            }
                        )
                        .fail(function(data, textStatus) {
                            location.reload();
                        });
                }
            });
            $('.dropify').dropify({
                messages: {
                    'default': 'Arrastra aquí una foto o haz click para buscarla',
                    'replace': 'Arrastra o haz click para cambiar la foto',
                    'remove': 'Eliminar',
                    'error': 'Vaya, algo ha ido mal'
                }
            });
        })
        </script>
</body>

</html>