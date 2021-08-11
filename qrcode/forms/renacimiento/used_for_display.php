 <input type="hidden" name="num_fields" id="num_fields" value="<?=$num_used_for?>">

 <div class="card bg-secondary col-sm-4">
        <div class="card-header">
            <div class="card-tools float-left">
                <button type="button" class="btn btn-lg btn-tool text-lg"><i class="fas fa-map-marker-alt"></i>
                </button>
            </div>
            <h3 class="card-title float-right font-weight-bold">USADO EN</h3>
        </div>
        <div class="card-body mx-auto pr-0 pl-0">
            <div class="">
                <?php for ($i=0;$i < $num_used_for;$i++): ?>
                    <button class="btn btn-app text-md"><?=(is_array($used_for))?$used_for[$i]:'Ninguno' ?></button>
                <?php endfor ?>
                
            </div>
            
        </div>      
    </div>