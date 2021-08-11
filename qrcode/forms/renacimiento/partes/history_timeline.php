<?php if ($history_qr): ?>
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title text-center">HISTORIAL DE CAMBIOS</h3>
                </div>

                <div class="card-body">
                    <!-- TIMELINE -->
                    <div class="timeline mt-2">


                        
                        <?php foreach ($history_qr as $row): $obj = unserialize(base64_decode($row->qr_data))?>
                        <?php 
                        //SACAR NOMBRE DE USUARIO
                            $id_updater=$obj->updated_by;
                            $usuario_updater = $db->arraybuilder()->where('id', $id_updater)->get('admin_accounts');
                            $usuario_updater = $usuario_updater[0];
                        ?>
                        <!-- ETIQUETA DE DÍA -->
                        <div class="time-label">
                            <span class="bg-green"><?=date('j / n / Y', strtotime($obj->updated_at))?></span>
                        </div>
                        <!--CAMBIO-->
                        <div>
                            <!-- ICONO DE LA IZQUIERDA-->
                            <i class="fas fa-user-edit bg-blue"></i>
                            <!-- FILA DE CAMBIO -->
                            <div class="timeline-item">
                                <!-- Time -->
                                <span class="time"><i class="fas fa-clock"></i> <?=date('G:i', strtotime($obj->updated_at))?></span>
                                <!-- HEADER -->
                                <h3 class="timeline-header"><a href="#">@<?=$usuario_updater['user_name']?></a> ha modificado el eWay</h3>
                                <!-- BODY -->
                                <div class="timeline-body">
                                    <b>URL:</b> <?=$obj->link?>
                                </div>
                                <!-- FOOTER -->
                                <div class="timeline-footer">
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-remote="history_modal.php?id=<?=$row->id?>" data-target="#exampleModal">
                                        <i class="fas fa-eye text-white"></i>
                                        Ver más
                                    </button>
                                    <a class="btn btn-info btn-sm" href="<?=$obj->link?>" target="_blank">
                                        <i class="fas fa-link text-white"></i>
                                        Ir al link
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>

                        <!-- ICONO FINAL (Cargar más) -->
                        <div>
                            <i class="fas fa-clock bg-gray"></i>
                        </div>
                    </div>
                </div>
            </div>
<?php endif ?>