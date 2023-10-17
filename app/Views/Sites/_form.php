<div class="form-group">
   <label class="col-lg-12 control-label">Nome do Site</label>
   <div class="col-lg-12">
      <input type="text" name="nome" class="form-control" required maxlength="100" value="<?php echo esc($site->nome); ?>">
      <span class="help-block"></span>
   </div>
</div>

<div class="form-group">
   <label class="col-lg-12 control-label">Imagem</label>
   <div class="col-lg-12">
      <?php if($site->imagem === null): ?>
         <img id="site_img_path" src="" style="max-height: 300px; max-height: 300px">
      <?php else: ?>                  
         <img id="site_img_path" src="<?php echo site_url("sites/").$site->imagem; ?>" style="max-height: 300px; max-height: 300px">
      <?php endif; ?>
      <label class="btn btn-block btn-info">
         <i class="fa fa-upload"></i>&nbsp;&nbsp;Importar imagem
         <input type="file" id="btn_upload_site_img" name="imagem" accept="image/*" style="display: none;">
      </label>                
      <span class="help-block"></span>
   </div>
</div>

<div class="form-group">
   <label class="col-lg-12 control-label">Url</label>
   <div class="col-lg-12">
      <input type="text" name="url" class="form-control" required maxlength="100" value="<?php echo esc($site->url); ?>">
      <span class="help-block"></span>
   </div>
</div>
