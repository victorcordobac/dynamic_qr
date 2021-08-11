<fieldset>


    <!--NOMBRE-->
    <div class="card bg-secondary col-sm-4">
        <div class="card-header">
            <div class="card-tools float-left">
                <button type="button" class="btn btn-lg btn-tool text-lg"><i class="fas fa-qrcode"></i>
                </button>
            </div>
            <h3 class="card-title float-right font-weight-bold">NOMBRE</h3>
        </div>
        <div class="card-body">
            <h3 class="font-weight-bold text-center"><?=$dynamic_qrcode['filename'] ?></h3>
        </div>      
    </div>

    <div class="col-sm-4" style="display:none">
        <div class="form-group">
            <label for="filename">Nombre</label>
            <!--p>Puedes cambiar el nombre y url a la que dirige, pero no cambiará la imágen del QR</p-->
            <input type="text" name="filename"
                value="<?php echo htmlspecialchars($edit ? $dynamic_qrcode['filename'] : '', ENT_QUOTES, 'UTF-8'); ?>"
                placeholder="Nombre" class="form-control" required="required" id="filename">
        </div>
    </div>

    <!--URL-->
    <div class="card bg-secondary col-sm-4">
        <div class="card-header">
            <div class="card-tools float-left">
                <button type="button" class="btn btn-lg btn-tool text-lg"><i class="fas fa-link"></i>
                </button>
            </div>
            <h3 class="card-title float-right font-weight-bold">URL</h3>
        </div>
        <div class="card-body">
            <div class="form-group input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-link"></i></span>
                    </div>
                    <input type="url" pattern="https://.*" name="link"
                    value="<?php echo htmlspecialchars($edit ? $dynamic_qrcode['link'] : '', ENT_QUOTES, 'UTF-8'); ?>"
                    placeholder="https://ejemplo.com" class="form-control" required="required" id="link">
            </div>
            <p class="text-white text-justify">Cambia la URL a la que apunta tu eWay </p>
        </div>          
    </div>

    <!--USADO EN-->
    <?php include_once(BASE_PATH. '/forms/renacimiento/used_for_display.php') ?>
</fieldset>