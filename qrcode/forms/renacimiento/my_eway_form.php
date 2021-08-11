<fieldset>


    <!--NOMBRE-->
    <div class="card bg-secondary col-sm-4" style="display:none">
        <div class="card-header">
            <div class="card-tools float-left">
                <button type="button" class="btn btn-lg btn-tool text-lg"><i class="fas fa-qrcode"></i>
                </button>
            </div>
            <h3 class="card-title float-right font-weight-bold">NOMBRE</h3>
        </div>
        <div class="card-body">
            <h3 class="font-weight-bold text-center"><?= $dynamic_qrcode['filename'] ?></h3>
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
        <div class="card-body pb-2 pt-2">
            <p class="text-white text-center mb-3">Cambia la URL a la que apunta tu eWay </p>
            <div class="form-group input-group mb-1">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-link"></i></span>
                </div>
                <input type="url" pattern="https://.*" name="link"
                    value="<?php echo htmlspecialchars($edit ? $dynamic_qrcode['link'] : '', ENT_QUOTES, 'UTF-8'); ?>"
                    placeholder="https://ejemplo.com" class="form-control" required="required" id="link">
            </div>
        </div>
        <div class="card-footer mx-auto text-center pb-4">
            <button type="submit"
                class="btn btn-lg btn-primary text-center font-weight-bold text-uppercase text-md mx-auto text-white text-md"
                id="actualizar"><i class="fas fa-save mr-2"></i>Guardar</button>
        </div>
    </div>

    <!--USADO EN-->
    <?php include_once(BASE_PATH . '/forms/renacimiento/partes/used_for_display.php') ?>

</fieldset>