<?php
require_once 'config/config.php';

class SocailAuth
{
    public function user_exist($email)
    {
        // Get DB instance.
        $db = getDbInstance();

        $db->where('email', $email);
        $row = $db->getOne('admin_accounts');

        if ($db->count >= 1) {
            $user_id = $row['id'];
            $_SESSION['user_logged_in'] = true;
            $_SESSION['admin_type'] = $row['admin_type'];
            $_SESSION['user_id'] = $row['id'];

            include 'forms/renacimiento/eway_principal_get.php';

            header("Location: $default_qr_url");
            exit();
        }
        return false;
    }
}