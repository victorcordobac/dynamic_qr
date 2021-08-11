<?php if ($history_qr): ?>
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">HISTORIAL</h3>
                </div>
                
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>URL</th>
                                <th width="5%">Ver</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($history_qr as $row): $obj = unserialize(base64_decode($row->qr_data))?>
                            <tr>
                                <td>
                                    <!--<?=date('j / n / Y  -  G:i:s', strtotime($row->created_at))?>--> <!--ERROR. muestta cuando se han guardado esos datos, que es el momento de la actualizaciómn siguiente. -Está corregido abajo-->
                                    <?=date('j / n / Y  -  G:i:s', strtotime($obj->updated_at))?>
                                </td>
                                <td>
                                    <?=$obj->link?>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-remote="history_modal.php?id=<?=$row->id?>" data-target="#exampleModal">
                                        <i class="fas fa-eye text-white"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
<?php endif ?>