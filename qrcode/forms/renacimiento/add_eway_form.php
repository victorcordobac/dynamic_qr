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
                <input type="text" name="filename" value="" placeholder="Viaje a la playa" class="form-control"
                    required="required" id="filename">
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
                <input type="url" pattern="https://.*" name="link" value="" placeholder="https://ejemplo.com"
                    class="form-control" required="required" id="link">
            </div>
            <p class="text-white text-center">Puedes cambiarla siempre que quieras</p>
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
                Marca la casilla si quieres que este sea tu
                <b>eWay principal</b>
            </p>
        </div>
    </div>



    <!--
    |-----------------------------------------|
    |       CAMPOS OCULTOS PREDEFINIDOS       |
    |-----------------------------------------|
    -->

    <div class="col-sm-12 mb-2" style="display:none">
        <div class="row">
            <div class="col-6 col-md-3">
                <label for="foreground">Color principal:</label>
                <div class="input-group my-colorpicker2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-qrcode"></i></span>
                    </div>

                    <input type="text" class="form-control" id="foreground" name="foreground" value="#000000">
                </div>
            </div>

            <div class="col-6 col-md-3">
                <label for="background">Color fondo:</label>
                <div class="input-group my-colorpicker2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-qrcode"></i></span>
                    </div>

                    <input type="text" class="form-control" id="background" name="background" value="#ffffff">
                </div>
            </div>

            <div class="col-6 col-md-3">
                <label for="level">Precisión</label>
                <select name="level" class="form-control">
                    <option value="L">L - Pequeño</option>
                    <option value="M">M - Mediano</option>
                    <option value="Q">Q - Grande</option>
                    <option selected="selected" value="H">H - Mayor calidad</option>
                </select>
            </div>

            <div class="col-6 col-md-3">
                <label for="size">Tamaño (px)</label>
                <select name="size" class="form-control">
                    <option value="100">100</option>
                    <option value="200">200</option>
                    <option value="300">300</option>
                    <option value="400">400</option>
                    <option value="500">500</option>
                    <option value="600">600</option>
                    <option value="700">700</option>
                    <option value="800">800</option>
                    <option value="900">900</option>
                    <option selected="selected" value="1000">1000</option>
                </select>
            </div>

            <div class="col-6 col-md-1">
                <label for="format">Formato</label>
                <select name="format" class="form-control">
                    <option selected="selected" value="png">PNG</option>
                    <option value="gif">GIF</option>
                    <option value="jpeg">JPEG</option>
                    <option value="jpg">JPG</option>
                    <option value="svg">SVG</option>
                    <option value="eps">EPS</option>
                </select>
            </div>

        </div>
    </div>




</fieldset>