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
            <div class="form-group">
                <!--p>Puedes cambiar el nombre y url a la que dirige, pero no cambiará la imágen del QR</p-->
                <input type="text" name="filename"
                    value="<?php echo htmlspecialchars($edit ? $dynamic_qrcode['filename'] : '', ENT_QUOTES, 'UTF-8'); ?>"
                    placeholder="Nombre" class="form-control" required="required" id="filename">
            </div>
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
    <?php include_once(BASE_PATH . '/forms/renacimiento/partes/used_for_field_new.php') ?>

    <!--QR PRINCIPAL-->
    <div class="card bg-secondary col-sm-4">
        <div class="card-header">
            <div class="card-tools float-left">
                <button type="button" class="btn btn-lg btn-tool text-lg"><i class="fas fa-star"></i>
                </button>
            </div>
            <h3 class="card-title float-right font-weight-bold">PRINCIPAL</h3>
        </div>
        <div class="card-body">
            <div class="form-group text-center">
                <input type="checkbox" class="" name="is_default" id="is_default" value="1"
                    <?php echo ($edit && $dynamic_qrcode['is_default'] == '1') ? "checked" : "" ?>
                    style="width: 1.5em;height: 1.5em; margin: 0em 1.5em 0.5em 1.5em; vertical-align: middle;" />

            </div>

            <p class="text-white text-center">
                <?php echo ($edit && $dynamic_qrcode['is_default'] == '1') ? "Este es tu" : "Marca la casilla si quieres que este sea tu" ?><b>
                    eWay principal</b></p>
        </div>
    </div>

    <!--ACTIVADO-->
    <div class="card bg-secondary col-sm-4">
        <div class="card-header">
            <div class="card-tools float-left">
                <button type="button" class="btn btn-lg btn-tool text-lg"><i class="fas fa-unlink"></i>
                </button>
            </div>
            <h3 class="card-title float-right font-weight-bold">ACTIVADO</h3>
        </div>
        <div class="card-body">
            <div class="form-group text-center">
                <input id="interruptor" type="checkbox" name="state"
                    <?php echo ($edit && $dynamic_qrcode['state'] == 'enable') ? "checked" : ""; ?>>
            </div>
            <p class="text-white text-justify">Puedes deshabilitar temporalmente este qr</p>
        </div>
    </div>

</fieldset>