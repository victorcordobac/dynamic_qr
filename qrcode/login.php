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
$token = bin2hex(openssl_random_pseudo_bytes(16));

//SACAR DATOS DE EWAY PRINCIPAL
$db = getDbInstance();
if (isset($_SESSION['user_id'])) {
    $db->where('created_by', $_SESSION['user_id']);
    $default_qr = $db->objectBuilder()->where('is_default', 1)->orderBy('id', 'desc')->getOne('dynamic_qrcodes');
    if ($default_qr) {
        $default_qr_url = "my_eway.php?filename=" . $default_qr->filename . "&dynamic_id=" . $default_qr->id . "&operation=edit_url";
    } else $default_qr_url = "eways.php";
} else $default_qr_url = "eways.php";


//YA HE HECHO LOGIN
// If User has already logged in, redirect to EWAY PRINCIPAL
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {

    header("Location: $default_qr_url");

    //header('Location: eways.php');
}

//REMEMBER ME
// If user has previously selected "remember me option":
if (isset($_COOKIE['series_id']) && isset($_COOKIE['remember_token'])) {
    // Get user credentials from cookies.
    $series_id = filter_var($_COOKIE['series_id']);
    $remember_token = filter_var($_COOKIE['remember_token']);
    $db = getDbInstance();
    // Get user By series ID:
    $db->where('series_id', $series_id);
    $row = $db->getOne('admin_accounts');

    if ($db->count >= 1) {
        // User found. verify remember token
        if (password_verify($remember_token, $row['remember_token'])) {
            // Verify if expiry time is modified.
            $expires = strtotime($row['expires']);

            if (strtotime(date()) > $expires) {
                // Remember Cookie has expired.
                clearAuthCookie();
                header('Location: login.php');
                exit;
            }

            $_SESSION['user_logged_in'] = true;
            $_SESSION['admin_type'] = $row['admin_type'];
            header("Location: $default_qr_url");
            exit;
        } else {
            clearAuthCookie();
            header('Location: login.php');
            exit;
        }
    } else {
        clearAuthCookie();
        header('Location: login.php');
        exit;
    }
}
$db = getDbInstance();
$db->where('published', 1);
$buttons = $db->objectBuilder()->get('social_setting', null, ['provider']);
?>

<!DOCTYPE html>
<html lang="en">
<title>Login - Expression Way</title>
<?php include './includes/head.php'; ?>

<body class="login-page" style="min-height: 512.391px;">
    <div class="login-box">
        <div class="login-logo">
            <img src="dist/img/logo_horizontal_expressionway.png" style="width: 95%; height: 95%">
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Accede con tu usuario</p>

                <form method="POST" action="authenticate.php">
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Nombre de usuario"
                            required="required">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fa fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password"
                            required="required">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input name="remember" type="checkbox" id="remember">
                                <label for="remember">
                                    Recordar
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                        </div>
                        <!-- /.col -->
                    </div>

                </form>
                <?php if ($buttons) : ?>
                <div class="social-auth-links text-center mb-3">
                    <p>- O -</p>
                    <?php foreach ($buttons as $btn) :
                            $css = 'primary';
                            if ($btn->provider == 'Google') {
                                $css = 'danger';
                            }
                        ?>
                    <a name="" id="" class="btn btn-<?= $css ?> btn-block"
                        href="auth_login.php?network=<?= $btn->provider ?>" role="button">
                        <i class="fab fa-<?= strtolower($btn->provider) ?> mr-2" aria-hidden="true"></i>
                        Acceder usando <?= $btn->provider ?>
                    </a>
                    <?php endforeach ?>
                </div>
                <?php endif; ?>
                <p class="mb-0">
                    <a href="create_user_profile.php" class="text-center">Registrarse</a>
                </p>
                <?php if (isset($_SESSION['login_failure'])) : ?>
                <br>
                <div class="text-center mb-3">
                    <div class="card-body p-0">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php
                                echo $_SESSION['login_failure'];
                                unset($_SESSION['login_failure']);
                                ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>


            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>

</body>

</html>