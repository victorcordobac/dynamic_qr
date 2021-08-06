<form class="form" action="./add_static.php?type=event" method="post" id="static_form" enctype="multipart/form-data">
    <?php include BASE_PATH.'/forms/qrcode_options.php'; ?>
<!-- Input forms -->
<div class="col-sm-12 mb-2">
    <div class="row">
        <div class="col-6 col-md-3">
            <div class="form-group">
                <label>Título</label>
                <input type="text" name="title" value="" placeholder="" class="form-control">
            </div>
        </div>
    
        <div class="col-6 col-md-4">
            <div class="form-group">
                <label>Fecha Inicio</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-clock"></i></span>
                    </div>
                    <input type="text" name="start" value="" class="form-control float-right" id="start">
                </div><!-- /.input group -->
            </div>
        </div>
        
        <div class="col-6 col-md-4">
            <div class="form-group">
                <label>Fecha finalización</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-clock"></i></span>
                    </div>
                    <input type="text" name="end" value="" class="form-control float-right" id="end">
                </div><!-- /.input group -->
            </div>
        </div>
    </div>
</div>

<div class="col-sm-12 mb-2">
    <div class="row">
        <div class="col-6 col-md-3">
            <div class="form-group">
                <label>Localización </label>
                <input type="text" name="location" value="" placeholder="" class="form-control">
            </div>
        </div>
    
        <div class="col-6 col-md-5">
            <div class="form-group">
                <label>Descripción del evento </label>
                <input type="text" name="description" value="" placeholder="" class="form-control">
            </div>
        </div>
        
        <div class="col-6 col-md-3">
            <div class="form-group">
                <label>URL: </label>
                <input type="url" name="url" value="" placeholder="" class="form-control">
            </div>
        </div>
    </div>
</div>

<div class="col-sm-12 mb-2">
    <div class="row">
        <div class="col-6 col-md-3">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>    
    </div>
</div>
                
</form>

<script src="plugins/moment/moment.min.js"></script>