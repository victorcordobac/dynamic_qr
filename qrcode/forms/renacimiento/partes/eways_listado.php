<div class="row">
    <?php foreach ($rows as $row) : ?>
    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
        <div class="card bg-light d-flex flex-fill">
            <?php if (htmlspecialchars($row['is_default'] == 1)) : ?>
            <div class="ribbon-wrapper ribbon-xl text-shadow-none">
                <div class="ribbon bg-warning text-lg text-white">
                    <i class="fa fa-star mr-1 text-white" style="text-shadow:none"></i>
                    <span class="fobt-weight-bold text-white" style="text-shadow:none; font-weight:bold"> PRINCIPAL
                    </span>
                </div>
            </div>
            <?php endif ?>
            <div class="card-header bg-primary text-muted border-bottom-0 text-center">

                <!--button class="btn btn-warning text-white mb-3">
                        <i class="fa fa-star mr-1"></i>
                        PRINCIPAL
                    </button-->

                <h2 class="text-lg font-weight-bold text-center"> <?php echo htmlspecialchars($row['filename']); ?></h2>
            </div>
            <div class="card-header  text-muted  border-top-0 mt-2 mb-3 text-center text-white border-bottom-0">
                <a href="<?= htmlspecialchars($row['link']); ?>" target="_blank" class="btn btn-info"
                    style="overflow-wrap: anywhere" ;>
                    <i class="fa fa-link mr-1"></i>
                    <?php
                        //ELIMINAR HTTPS y www de la vista pública
                        $link_original = htmlspecialchars($row['link']);
                        $texto_quitar = array('www.', 'https://');
                        $link_limpio = str_replace($texto_quitar, "", "$link_original");
                        ?>
                    <b><?= $link_limpio ?></b>
                </a>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-7">
                        <ul class="ml-4 mb-4 fa-ul text-muted">
                            <li class="medium mb-4">
                                <span class="fa-li">
                                    <i class="fas fa-lg fa-map-marker-alt"></i>
                                </span>
                                <b>Usado en: </b>
                                <?php echo htmlspecialchars($row['used_for']); ?>
                            </li>
                            <li class="medium mb-4"><span class="fa-li"><i class="fas fa-lg fa-camera"></i></span>
                                <b>Scans:</b> <?php echo htmlspecialchars($row['scan']); ?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-5 text-center">
                        <?php echo '<img src="' . PATH . htmlspecialchars($row['qrcode']) . '" alt="eway-code" class="img-fluid"'; ?>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-center mx-auto">
                    <!-- VER / EDIT-URL -->
                    <a href="my_eway.php?filename=<?php echo $row['filename']; ?>&dynamic_id=<?php echo $row['id']; ?>&operation=edit_url"
                        class="btn btn-primary mr-2"><i class="fas fa-eye"></i></a>
                    <!-- EDIT -->
                    <a href="my_eway_edit.php?filename=<?php echo $row['filename']; ?>&dynamic_id=<?php echo $row['id']; ?>&operation=edit"
                        class="btn btn-primary mr-2"><i class="fas fa-edit"></i></a>

                    <!-- DOWNLOAD -->
                    <a href="<?php echo PATH . htmlspecialchars($row['qrcode']); ?>" class="btn btn-primary mr-2"
                        download><i class="fa fa-download"></i></a>
                    <!-- DELETE -->
                    <a href="#" class="btn btn-danger delete_btn mr-2" data-toggle="modal"
                        data-target="#confirm-delete-<?php echo $row['id']; ?>"><i class="fas fa-trash"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
</div>