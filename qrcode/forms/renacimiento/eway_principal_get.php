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



//SACAR DATOS DE EWAY PRINCIPAL
if (isset($_SESSION['user_id'])) {
    $db = getDbInstance();
    $db->where('created_by', $_SESSION['user_id']);
    $default_qr = $db->objectBuilder()->where('is_default', 1)->orderBy('id', 'desc')->getOne('dynamic_qrcodes');
    if ($default_qr) {
        $default_qr_url = "my_eway.php?filename=" . $default_qr->filename . "&dynamic_id=" . $default_qr->id .
            "&operation=edit_url";
    } else $default_qr_url = "eways.php";
} else $default_qr_url = "eways.php";