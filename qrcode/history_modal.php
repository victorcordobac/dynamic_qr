<?php
session_start();
require_once 'config/config.php';

$id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');

$db = getDbInstance();
$db->where('dynamic_qr_version.id', $id);
$db->where('dynamic_qrcodes.created_by', $_SESSION['user_id']);
$db->join('dynamic_qrcodes', 'dynamic_qrcodes.id=dynamic_qr_version.qr_id');
$row = $db->objectBuilder()->getOne('dynamic_qr_version');
if (is_object($row)) {
    $base_data = base64_decode($row->qr_data);
    $data = unserialize($base_data); ?>
<table class="table table-striped table-bordered">
    <tbody>
        <!--tr>
                <td>
                    <label>Identificador</label>
                </td>
                <td>
                    <?= $data->identifier ?>
                </td>
            </tr>
            <tr-->
        <td>
            <label>Nombre</label>
        </td>
        <td>
            <?= $data->filename ?>
        </td>
        </tr>
        <tr>
            <td>
                <label>URL</label>
            </td>
            <td>
                <?= $data->link ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Usado en</label>
            </td>
            <td>
                <?= $data->used_for ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Activado</label>
            </td>
            <td>
                <?= ($data->state == 'enable') ? 'SI' : 'NO' ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>eWay Principal</label>
            </td>
            <td>
                <?= ($data->is_default) ? 'SI' : 'NO' ?>
            </td>
        </tr>

        <tr>
            <td>
                <label>Creado</label>
            </td>
            <td>
                <!--<?= $data->created_at ?>-->
                <?= date('j / n / Y  -  G:i:s', strtotime($data->created_at)) ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Última edición</label>
            </td>
            <td>
                <!--<?= $data->updated_at ?>-->
                <?= date('j / n / Y  -  G:i:s', strtotime($data->updated_at)) ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Actualizado por</label>
            </td>
            <td>
                <?= $data->updated_by ?>
            </td>
        </tr>
    </tbody>
</table>
<?php
} else {
    echo '<h3>No se encontraron datos</h3>';
} ?>