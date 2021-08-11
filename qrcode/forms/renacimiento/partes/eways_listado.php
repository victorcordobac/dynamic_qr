
<div class="row">
    <?php foreach ($rows as $row): ?>
        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
            <div class="card bg-light d-flex flex-fill">
                <div class="card-header bg-primary text-muted border-bottom-0 mb-3">
                   <h2 class="text-lg font-weight-bold text-center"> <?php echo htmlspecialchars($row['filename']); ?></h2>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-7">
                            <!--p class="text-muted text-md"><b>Usado en: </b> <?php echo htmlspecialchars($row['used_for']); ?></p-->
                            <ul class="ml-4 mb-4 fa-ul text-muted">
                                <li class="medium mb-4"><span class="fa-li"><i class="fas fa-lg fa-map-marker-alt"></i></span> <b>Usado en: </b> <?php echo htmlspecialchars($row['used_for']); ?></li>
                                <li class="medium mb-4"><span class="fa-li"><i class="fas fa-lg fa-camera"></i></span> <b>Scans:</b> <?php echo htmlspecialchars($row['scan']); ?></li>
                            </ul>
                        </div>
                        <div class="col-5 text-center">
                            <!--img src="../../dist/img/user1-128x128.jpg" alt="user-avatar" class="img-circle img-fluid"-->
                            <?php echo '<img src="'.PATH.htmlspecialchars($row['qrcode']).'" alt="eway-code" class="img-fluid"'; ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-center mx-auto">
                        <p class="text-md"><i class="fas fa-lg fa-link mr-2"></i><b><?php echo htmlspecialchars($row['link']); ?></b></h3>
                    </div>
                    <div class="text-center mx-auto">
                        <!-- VER / EDIT-URL -->
                        <a href="my_eway.php?filename=<?php echo $row['filename']; ?>&dynamic_id=<?php echo $row['id']; ?>&operation=edit_url" class="btn btn-primary mr-2"><i class="fas fa-eye"></i></a>
                        <!-- EDIT -->
                        <a href="edit_dynamic.php?filename=<?php echo $row['filename']; ?>&dynamic_id=<?php echo $row['id']; ?>&operation=edit" class="btn btn-primary mr-2"><i class="fas fa-edit"></i></a>
                        
                        <!-- DOWNLOAD -->
                        <a href="<?php echo PATH.htmlspecialchars($row['qrcode']); ?>" class="btn btn-primary mr-2" download><i class="fa fa-download"></i></a>
                        <!-- DELETE -->
                        <a href="#" class="btn btn-danger delete_btn mr-2" data-toggle="modal" data-target="#confirm-delete-<?php echo $row['id']; ?>"><i class="fas fa-trash"></i></a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive p-0">
      <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th width="18%">QR</th>
                <th width="15%">Nombre</th>
                <th width="10%" style="display:none">Identificador</th>
                <th width="20%">URL</th>
                <th width="10%">Creado por</th>
                <th width="20%">Usado en</th>
                <th width="5%">Scan</th>
                <th width="23%">Operaciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row): ?>
            <tr>
                <td>
                    <?php echo '<img src="'.PATH.htmlspecialchars($row['qrcode']).'" width="100" height="100">'; ?>
                </td>
                <td><?php echo htmlspecialchars($row['filename']); ?></td>
                <td style="display:none"><?php echo htmlspecialchars($row['identifier']); ?></td>
                <td><?php echo htmlspecialchars($row['link']); ?></td>
                <td><?php echo htmlspecialchars($row['user_name']); ?></td>
                <td><?php echo htmlspecialchars($row['used_for']); ?></td>
                
                <td><?php echo htmlspecialchars($row['scan']); ?></td>
                <td>
                    

                    <!-- VER / EDIT-URL -->
                    <a href="my_eway.php?filename=<?php echo $row['filename']; ?>&dynamic_id=<?php echo $row['id']; ?>&operation=edit_url" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                    <!-- EDIT -->
                    <a href="edit_dynamic.php?filename=<?php echo $row['filename']; ?>&dynamic_id=<?php echo $row['id']; ?>&operation=edit" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                    
                    <!-- DELETE -->
                    <a href="#" class="btn btn-danger delete_btn" data-toggle="modal" data-target="#confirm-delete-<?php echo $row['id']; ?>"><i class="fas fa-trash"></i></a>
                    
                    <!-- DOWNLOAD -->
                    <a href="<?php echo PATH.htmlspecialchars($row['qrcode']); ?>" class="btn btn-primary" download><i class="fa fa-download"></i></a>
                </td>
            </tr>
            <!-- Delete Confirmation Modal -->
            <div class="modal fade" id="confirm-delete-<?php echo $row['id']; ?>" role="dialog">
                <div class="modal-dialog">
                    <form action="delete_dynamic.php" method="POST">
                        <!-- Modal content -->
                
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">CONFIRMAR</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="del_id" id="del_id" value="<?php echo $row['id']; ?>">
                                <input type="hidden" name="filename" id="filename" value="<?php echo $row['filename']; ?>">
                                <p>¿Estás seguro de que quieres eliminar este código QR?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">ELIMINAR</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.Delete Confirmation Modal -->
            <?php endforeach; ?>
        </tbody>
    </table>
   </div><!-- /.Card body -->
   
   <div class="card-footer clearfix">
       <?php echo paginationLinks($page, $total_pages, 'dynamic_qrcodes.php'); ?>
       </div><!-- /.Card footer -->
       
        </div><!-- /.Card -->
    </div><!-- /.col -->
</div><!-- /.row -->