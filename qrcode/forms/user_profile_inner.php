<?php if ($puede_editar) : ?>

<div class="card">
    <a href="admin_user_profile.php"
        class="btn btn-sm btn-primary text-uppercase font-weight-bold text-white float-right">
        <i class="fas fa-edit mr-2"></i> EDITAR
    </a>
</div>
<?php endif ?>

<div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-header text-muted border-bottom-0 bg-primary mb-2 text-center">
                <h1 class="lead text-lg font-weight-bold">
                    <b><?= $profile->first_name, ' ', $profile->last_name ?></b>
                    </h2>
                    <p class="text-gray">@<?= $profile->user_name ?></p>
            </div>
            <div class="card-body box-profile">
                <div class="text-center">
                    <?php
          $img = 'upload/images/dummy-profile-pic.png';
          $path_info = pathinfo($profile->profile_pic);
          $path = 'upload/images/' . $profile->profile_pic;
          if (file_exists($path) && key_exists('extension', $path_info)) {
            $img = $path;
          }

          ?>
                    <img class="profile-user-img img-fluid img-circle" src="<?= $img ?>"
                        alt="<?= $profile->first_name ?>">
                </div>

                <!--p class="text-muted text-center mb-1"><?= $profile->user_name ?></p>
        <p class="text-muted text-center"><?= $profile->email ?></p-->
                <div class="mx-auto mt-4 text-center">
                    <a href="" class="btn btn-app pb-5">
                        <i class="fa fa-qrcode"></i>
                        <b class="text-lg mr-2"><?= count($dynamic_qrcodes) ?></b>eWays
                    </a>
                    <a href="" class="btn btn-app text-center pb-5">
                        <i class="fa fa-camera"></i>
                        <b class="text-lg mr-2"><?= $num_scans[0]['sum(scan)']; ?></b>scans
                    </a>
                </div>
                <div class="card-footer clearfix">
                    <div class="float-right">
                        <a href="mailto:<?= $row['email'] ?>" class="btn btn-md btn-danger mr-2">
                            <i class="fas fa-envelope"></i>
                        </a>
                        <a href="tel:+34<?= $row['mobile_no'] ?>" class="btn btn-md btn-danger">
                            <i class="fas fa-phone"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <?php if (strlen($profile->facebook) || strlen($profile->twitter) || strlen($profile->instagram)) : ?>
        <div class="card card-primary">
            <div class="card-header">
                <h4 class="text-lg text-center font-weight-bold text-uppercase mb-0">Redes Sociales</h4>
            </div>
            <div class="card-body text-center">
                <?php if (strlen($profile->facebook)) : ?>
                <a ref="<?= $profile->facebook ?>" target="_blank" class="btn btn-lg btn-info mr-2">
                    <i class="fab fa-facebook"></i>
                </a>
                <?php endif ?>
                <?php if (strlen($profile->twitter)) : ?>
                <a ref="<?= $profile->twitter ?>" target="_blank" class="btn btn-lg btn-info mr-2">
                    <i class="fab fa-twitter"></i>
                </a>
                <?php endif ?>
                <?php if (strlen($profile->instagram)) : ?>
                <a ref="<?= $profile->instagram ?>" target="_blank" class="btn btn-lg btn-info mr-2">
                    <i class="fab fa-instagram"></i>
                </a>
                <?php endif ?>
            </div>
        </div>
        <?php endif ?>
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <nav class="nav nav-pills">
                    <a class="nav-link active" data-toggle="tab" href="#dynamic_qr"><i
                            class="fa fa-qrcode mr-2"></i>EWAYS</a>
                    <a class="nav-link" data-toggle="tab" href="#static_qr"><i
                            class="fa fa-barcode mr-2"></i>ETIQUETAS</a>
                </nav>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="dynamic_qr" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="row">
                                    <?php if ($default_qr) : ?>
                                    <div class="col-md-12">
                                        <h3> QR PRINCIPAL</h3>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">

                                            <div class="col-md-2">
                                                <div class="card">
                                                    <div class="card-header bg-primary">
                                                        <h4 class="card-title text-center font-weight-bold">
                                                            <?= $default_qr->filename ?></h4>
                                                    </div>
                                                    <img src="<?= PATH . htmlspecialchars($default_qr->qrcode) ?>"
                                                        class="card-img-top">
                                                    <div class="card-body">
                                                        <!--h5 class="card-title"><?= $default_qr->filename ?></h5-->
                                                        <p class="card-text text-center"><strong>Scans:</strong>
                                                            <?= $default_qr->scan ?></p>
                                                    </div>

                                                    <div class="card-footer">
                                                        <div class="text-center mx-auto">
                                                            <!--URL -->
                                                            <a href="<?= htmlspecialchars($dcode->link); ?>"
                                                                target="_blank" class="btn btn-primary mr-2"><i
                                                                    class="fas fa-link"></i></a>
                                                            <?php if ($puede_editar) : ?>
                                                            <!-- VER / EDIT-URL -->
                                                            <a href="my_eway.php?filename=<?php echo $dcode->filename; ?>&dynamic_id=<?php echo $dcode->id; ?>&operation=edit_url"
                                                                class="btn btn-primary mr-2"><i
                                                                    class="fas fa-eye"></i></a>
                                                            <!-- EDIT -->
                                                            <a href="my_eway_edit.php?filename=<?php echo $dcode->filename; ?>&dynamic_id=<?php echo $dcode->id; ?>&operation=edit"
                                                                class="btn btn-primary mr-2"><i
                                                                    class="fas fa-edit"></i></a>
                                                            <?php endif ?>

                                                            <!-- DOWNLOAD -->
                                                            <a href="<?php echo PATH . htmlspecialchars($dcode->qrcode); ?>"
                                                                class="btn btn-primary mr-2" download><i
                                                                    class="fa fa-download"></i></a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif ?>
                                    <div class="col-md-12">
                                        <h3> EWAYS</h3>
                                    </div>
                                    <?php foreach ($dynamic_qrcodes as $dcode) : ?>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-header bg-primary">
                                                <h4 class="card-title text-center font-weight-bold">
                                                    <?= $dcode->filename ?></h4>
                                            </div>
                                            <img src="<?= PATH . htmlspecialchars($dcode->qrcode) ?>"
                                                class="card-img-top">
                                            <div class="card-body">

                                                <p class="card-text text-center"><strong>Scans:</strong>
                                                    <?= $dcode->scan ?></p>
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-center mx-auto">
                                                    <!--URL -->
                                                    <a href="<?= htmlspecialchars($dcode->link); ?>" target="_blank"
                                                        class="btn btn-primary mr-2"><i class="fas fa-link"></i></a>
                                                    <?php if ($puede_editar) : ?>
                                                    <!-- VER / EDIT-URL -->
                                                    <a href="my_eway.php?filename=<?php echo $dcode->filename; ?>&dynamic_id=<?php echo $dcode->id; ?>&operation=edit_url"
                                                        class="btn btn-primary mr-2"><i class="fas fa-eye"></i></a>
                                                    <!-- EDIT -->
                                                    <a href="my_eway_edit.php?filename=<?php echo $dcode->filename; ?>&dynamic_id=<?php echo $dcode->id; ?>&operation=edit"
                                                        class="btn btn-primary mr-2"><i class="fas fa-edit"></i></a>
                                                    <?php endif ?>

                                                    <!-- DOWNLOAD -->
                                                    <a href="<?php echo PATH . htmlspecialchars($dcode->qrcode); ?>"
                                                        class="btn btn-primary mr-2" download><i
                                                            class="fa fa-download"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach ?>
                                    <?php if (count($dynamic_qrcodes) == 0) : ?>
                                    <div class="col-md-12">
                                        <div class="alert alert-info" role="alert">
                                            No se encontraron QR dinámicos
                                        </div>
                                    </div>
                                    <?php endif ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="static_qr" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <!--h3> QR Estáticos</h3-->
                                    </div>
                                    <?php foreach ($static_qrcodes as $dcode) : ?>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-header bg-primary">
                                                <h4 class="card-title text-center font-weight-bold">
                                                    <?= $dcode->filename ?></h4>
                                            </div>
                                            <img src="<?= PATH . htmlspecialchars($dcode->qrcode); ?>"
                                                class="card-img-top">
                                            <div class="card-body">
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-center mx-auto">
                                                    <?php if ($puede_editar) : ?>
                                                    <!--CONTENT-->
                                                    <a href="<?= htmlspecialchars($dcode->CONTENT); ?>" target="_blank"
                                                        class="btn btn-primary mr-2"><i class="fas fa-link"></i></a>
                                                    <!-- EDIT -->
                                                    <a href="edit_static.php?filename=<?php echo $dcode->filename; ?>&static_id=<?php echo $dcode->id; ?>&operation=edit"
                                                        class="btn btn-primary mr-2"><i class="fas fa-edit"></i></a>
                                                    <?php endif ?>

                                                    <!-- DOWNLOAD -->
                                                    <a href="<?php echo PATH . htmlspecialchars($dcode->qrcode); ?>"
                                                        class="btn btn-primary" download><i
                                                            class="fa fa-download"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach ?>
                                    <?php if (count($static_qrcodes) == 0) : ?>
                                    <div class="col-md-12">
                                        <div class="alert alert-info" role="alert">
                                            No se encontraron QR estáticos
                                        </div>
                                    </div>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>