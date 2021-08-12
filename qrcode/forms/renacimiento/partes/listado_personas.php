<div class="row">
    <div class="col-12">
        <div class="card cards-solid">
            <div class="card-body pb-0">
                <div class="row">

                    <?php foreach ($rows as $row) :
                        //REVISA SI HAY FOTO - si no pone una por defecto
                        $img = 'upload/images/dummy-profile-pic.png';
                        $path_info = pathinfo($row['profile_pic']);
                        $path = 'upload/images/' . $row['profile_pic'];
                        if (file_exists($path) && key_exists('extension', $path_info)) {
                            $img = $path;
                        }
                        //SACAR CONTEO DE EWAYS y de SCANS
                        $db->where('created_by', $row['id']);
                        $num_eways = $db->getValue("dynamic_qrcodes", "count(*)");
                        $db->where('created_by', $row['id']);
                        $num_scans = $db->query("SELECT sum(scan) FROM dynamic_qrcodes");

                    ?>
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0 bg-primary mb-4">
                                <p class="text-gray">@<?= $row['user_name'] ?></p>
                                <h2 class="lead text-xl font-weight-bold">
                                    <b><?= ($row['first_name'] . ' ' . $row['last_name']); ?></b>
                                </h2>
                            </div>
                            <div class="card-body pt-3">
                                <div class="row">
                                    <div class="col-7">
                                        <button class="btn btn-info btn-block"><i class="fa fa-qrcode mr-2"></i>
                                            <b class="text-lg mr-2"><?= $num_eways ?></b>eWays
                                        </button>
                                        <button class="btn btn-info btn-block"><i class="fa fa-camera mr-2"></i>
                                            <b class="text-lg mr-2"><?= $num_scans[0]['sum(scan)']; ?></b>scans</button>
                                    </div>
                                    <div class="col-5 text-center">
                                        <img src="<?= $img ?>" alt="foto-perfil-<?= $row['user_name'] ?>"
                                            class="img-circle img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer clearfix">
                                <div class="float-left">
                                    <a href="mailto:<?= $row['email'] ?>" class="btn btn-md btn-danger mr-2">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                    <a href="tel:+34<?= $row['mobile_no'] ?>" class="btn btn-md btn-danger mr-4">
                                        <i class="fas fa-phone"></i>
                                    </a>
                                </div>
                                <div class="float-right">
                                    <a href="user_profile.php?user=<?php echo $row['user_name']; ?>"
                                        class="btn btn-sm btn-primary text-uppercase font-weight-bold text-white">
                                        <i class="fas fa-user mr-2"></i> Ver perfil
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>

            </div><!-- /.Card body -->

            <div class="card-footer clearfix">
                <?php echo paginationLinks($page, $total_pages, 'people.php'); ?>
            </div><!-- /.Card footer -->

        </div><!-- /.Card -->
    </div><!-- /.col -->
</div><!-- /.row -->