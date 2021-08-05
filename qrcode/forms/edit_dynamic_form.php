<fieldset>

    <!--div class="col-sm-4">
        <label for="state">Redirigir a URL</label>
        
        <div class="form-group">
            <label class="radio-inline">
            <input type="radio" name="state" value="enable" <?php echo ($edit &&$dynamic_qrcode['state'] =='enable') ? "checked": "" ; ?> required="required" id="enable"/> Activar</label>
            
            <label class="radio-inline">
            <input type="radio" name="state" value="disable" <?php echo ($edit && $dynamic_qrcode['state'] =='disable')? "checked": "" ; ?> required="required" id="disable"/> Desactivar</label>
        </div>
    </div-->

    <div class="col-sm-4">
        <label for="state">Activado</label>
        <div class="form-group bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-focused bootstrap-switch-animate bootstrap-switch-off" style="width: 86px;">
            <div class="bootstrap-switch-container" style="width: 126px; margin-left: -42px;">
                <span class="bootstrap-switch-handle-on bootstrap-switch-success" style="width: 42px;" value="enable" id="enable">ON</span>
                <span class="bootstrap-switch-label" style="width: 42px;">&nbsp;</span>
                <span class="bootstrap-switch-handle-off bootstrap-switch-danger" style="width: 42px;" value="disable" id="disable">OFF</span>
                <input type="checkbox" name="state
                
                " checked="<?php echo ($edit &&$dynamic_qrcode['state'] =='enable') ? "true": "false" ; ?>" data-bootstrap-switch="" data-off-color="danger" data-on-color="success">
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            <label for="identifier">Redirect identifier</label>
            <input type="text" name="identifier" value="<?php echo htmlspecialchars($edit ? $dynamic_qrcode['identifier'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Identifier" class="form-control" id="identifier" readonly>
        </div>
    </div>
    

    <div class="col-sm-4">
        <div class="form-group">
            <label for="filename">Nombre *</label>
            <p>Puedes cambiar el nombre y url a la que dirige, pero no cambiará la imágen del QR</p>
            <input type="text" name="filename" value="<?php echo htmlspecialchars($edit ? $dynamic_qrcode['filename'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Nombre" class="form-control" required="required" id = "filename">
        </div> 
    </div>
    
    <div class="col-sm-4">
        <div class="form-group">
            <label for="link">URL *</label>
            <input type="url" pattern="https://.*" name="link" value="<?php echo htmlspecialchars($edit ? $dynamic_qrcode['link'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Link" class="form-control" required="required" id="link">
        </div>
    </div>
    
</fieldset>