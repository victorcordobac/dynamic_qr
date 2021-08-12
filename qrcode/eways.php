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

// Get DB instance. i.e instance of MYSQLiDB Library
$db = getDbInstance();
$select = array('dynamic_qrcodes.id', 'user_name', 'filename', 'identifier', 'link', 'qrcode', 'scan', 'created_at', 'updated_at', 'used_for', 'is_default');

// Search and order php code
$search_fields = array('filename', 'identifier', 'link');
require_once BASE_PATH . '/includes/search_order.php';

// Get current page
$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? 1;
$db->join('admin_accounts', 'admin_accounts.id = dynamic_qrcodes.created_by');

if ($_SESSION['admin_type'] !== 'super') {
    $db->where('created_by', $_SESSION['user_id']);
}


// Set pagination limit
$db->pageLimit = 15;

// Get result of the query
$rows = $db->arraybuilder()->paginate('dynamic_qrcodes', $page, $select);
$total_pages = $db->totalPages;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>EWAYS - Expression Way</title>
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
            <!-- Content Header -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2 clearfix">

                        <div class="col-sm-12 col-xs-12">
                            <h1 class="m-0 text-dark float-left"> MIS EWAYS</h1>
                            <a href="add_dynamic.php" class="btn btn-success float-right"><i class="fa fa-plus"></i>
                                Nuevo</a>
                        </div><!-- /.col -->

                        <div class="col-sm-6 col-xs-6">
                            <ol class="breadcrumb float-sm-right float-right">
                                <li class="breadcrumb-item">

                                </li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div><!-- /.content-header -->

            <!-- Flash message-->
            <?php include BASE_PATH . '/includes/flash_messages.php'; ?>
            <!-- /.Flash message-->


            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <!-- Table -->
                    <?php include BASE_PATH . '/forms/renacimiento/partes/eways_listado.php'; ?>
                    <!-- /.Table -->

                </div><!-- /.container-fluid -->
            </section>
        </div><!-- /.content-wrapper -->

        <!-- Footer and scripts -->
        <?php include './includes/footer.php'; ?>
        <!-- /.Footer and scripts -->
</body>

</html>