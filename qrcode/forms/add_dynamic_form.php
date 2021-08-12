<fieldset>
    <div class="col-sm-12 mb-2">
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
                    <option value="H">H - Mayor calidad</option>
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
                    <option value="1000">1000</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Its use is not recommended. Read the documentation
    <div class="form-group">
        <label for="logo">Logo</label>
        <?php //include 'logo.php' 
        ?>
    </div>
    -->

    <div class="col-sm-4">
        <div class="form-group">
            <label for="link">URL</label>
            <input type="url" pattern="https://.*" name="link" value="" placeholder="https://victorcordoba.com"
                class="form-control" required="required" id="link">
        </div>
    </div>


    <div class="col-sm-4" style="display:none">
        <div class="form-group">
            <label for="identifier">Identificador</label>
            <p>Se generará automáticamente</p>
        </div>
    </div>

    <div class="col-sm-12 mb-2">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="filename">Nombre</label>
                    <input type="text" name="filename" value="" placeholder="Camino de Santiago"
                        class="form-control error" required="required" id="filename">

                </div>
            </div>

            <div class="col-6 col-md-1">
                <label for="format">Formato</label>
                <select name="format" class="form-control">
                    <option value="png">PNG</option>
                    <option value="gif">GIF</option>
                    <option value="jpeg">JPEG</option>
                    <option value="jpg">JPG</option>
                    <option value="svg">SVG</option>
                    <option value="eps">EPS</option>
                </select>
            </div>
        </div>
    </div>

    <!-- CAMPO SOPORTES -->
    <?php include_once(BASE_PATH . '/forms/used_for_field.php') ?>

    <!--div class="col-sm-12 mb-2">
  <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input" name="is_default" id="is_default" value="1" >
      Default QR
    </label>
  </div>
</div-->

    <div class="col-sm-12 mb-2">
        <div class="form-group">
            <label class="">
                QR POR DEFECTO
            </label>
            <input type="checkbox" class="" name="is_default" id="is_default" value="0"
                style="width: 1.5em;height: 1.5em; margin: 0em 1.5em 0.5em 1.5em; vertical-align: middle;" />

        </div>
    </div>


</fieldset>