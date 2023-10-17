<?php echo $this->extend('Layout/principal_restrict'); ?>

<?= $this->section('titulo') ?> <?php echo $titulo ; ?> <?= $this->endSection() ?>

<?= $this->section('estilos') ?>

<link rel="stylesheet" type="text/css" href="<?php echo site_url('recursos/css/dataTables.bootstrap.min.css') ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo site_url('recursos/css/datatables.min.css') ?>" />

<?= $this->endSection() ?>

<?= $this->section('conteudo') ?>
  <!-- Navigation -->
  <nav class="navbar navbar-default navbar-shrink navbar-fixed-top">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header page-scroll">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li class="hidden">
            <a href="#page-top"></a>
          </li>
          <li>
            <a class="page-scroll" href="<?php echo site_url(); ?>#about">Sites</a>
          </li>
          <li>
            <a class="page-scroll" href="<?php echo site_url(); ?>#team">Usuários</a>
          </li>
          <li>
            <a class="page-scroll" href="<?php echo site_url('login/logoff'); ?>">Logoff</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section style="min-height: calc(100vh - 83px)" class="light-bg">
    
    <div class="container">
    
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_site" role="tab" data-toggle="tab">Sites</a></li>
        <li><a href="#tab_user" role="tab" data-toggle="tab">Usuários</a></li>
      </ul>

      <div class="tab-content">
        <div id="tab_site" class="tab-pane active">
          <div class="container-fluid">
            <h2 class="text-center"><strong>Gerenciar Sites</strong></h2>
            <a id="btn_add_site" class="btn btn-primary" style="margin-bottom: 10px;"><i class="fa fa-plus">&nbsp;&nbsp;Adicionar Site</i></a>
            <table id="dt_sites" class="table table-striped table-bordered">
              <thead>
                <tr class="tableheader">
                  <th class="dt-center">Nome</th>
                  <th class="dt-center no-sort">Imagem</th>
                  <th class="no-sort">Url</th>
                  <th class="dt-center no-sort">Ações</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>

        <div id="tab_user" class="tab-pane">
          <div class="container-fluid">
            <h2 class="text-center"><strong>Gerenciar Usuários</strong></h2>
            <a id="btn_add_user" class="btn btn-primary" style="margin-bottom: 10px;"><i class="fa fa-plus">&nbsp;&nbsp;Adicionar Usuário</i></a>
            <table id="dt_users" class="table table-striped table-bordered">
              <thead>
                <tr class="tableheader">
                  <th>Nome</th>
                  <th>E-mail</th>
                  <th class="dt-center no-sort">Ações</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div id="modal_site" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">x</button>
          <h4 class="modal-title"><?php echo $titulo; ?></h4>
        </div>

        <div class="modal-body">
          <?php echo form_open_multipart('restrict/save_site', ['id' => 'form_site']); ?>

            <input id="id" name="id" hidden value="<?php echo esc($site->id); ?>">

            <div class="form-group">
              <label class="col-lg-2 control-label">Nome</label>
              <div class="col-lg-10">
                <input type="text" id="nome" name="nome" class="form-control" required maxlength="100" value="<?php echo esc($site->nome); ?>">
                <span class="help-block"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-2 control-label">Imagem</label>
              <div class="col-lg-10">
                <?php if($site->imagem === null): ?>
                  <img id="site_img_path" src="" style="max-height: 300px; max-height: 300px">
                <?php else: ?>                  
                  <img id="site_img_path" src="<?php echo site_url("sites/$site->imagem"); ?>" style="max-height: 300px; max-height: 300px">
                <?php endif; ?>
                <label class="btn btn-block btn-info">
                  <i class="fa fa-upload"></i>&nbsp;&nbsp;Importar imagem
                  <input type="file" id="btn_upload_site_img" name="imagem" accept="image/*" style="display: none;">
                </label>                
                <span class="help-block"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-2 control-label">Url</label>
              <div class="col-lg-10">
                <input id="url" name="url" class="form-control" required maxlength="100" value="<?php echo esc($site->url); ?>">
                <span class="help-block"></span>
              </div>
            </div>

            <div class="form-group text-center">
              <button type="submit" id="btn_save_site" class="btn btn-primary">
                <i class="fa fa-save"></i>&nbsp;&nbsp;Salvar
              </button>
              <span class="help-block"></span>
            </div>

          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>

  <div id="modal_member" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">x</button>
          <h4 class="modal-title">Membro</h4>
        </div>

        <div class="modal-body">
          <form id="form_member">

            <input id="member_id" name="id" hidden>

            <div class="form-group">
              <label class="col-lg-2 control-label">Nome</label>
              <div class="col-lg-10">
                <input id="member_name" name="nome" class="form-control" maxlength="100">
                <span class="help-block"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-2 control-label">Foto</label>
              <div class="col-lg-10">
                <img id="member_photo_path" src="" style="max-height: 400px; max-height: 400px">
                <label class="btn btn-block btn-info">
                  <i class="fa fa-upload"></i>&nbsp;&nbsp;Importar foto
                  <input type="file" id="btn_upload_member_photo" accept="image/*" style="display: none;">
                </label>
                <input id="member_photo" name="imagem" hidden>
                <span class="help-block"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-2 control-label">Descrição</label>
              <div class="col-lg-10">
                <textarea id="member_description" name="member_description" class="form-control"></textarea>
                <span class="help-block"></span>
              </div>
            </div>

            <div class="form-group text-center">
              <button type="submit" id="btn_save_member" class="btn btn-primary">
                <i class="fa fa-save"></i>&nbsp;&nbsp;Salvar
              </button>
              <span class="help-block"></span>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

  <div id="modal_user" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">x</button>
          <h4 class="modal-title">Usuário</h4>
        </div>

        <div class="modal-body">
          <form id="form_user">

            <input id="user_id" name="id" hidden>

            <div class="form-group">
              <label class="col-lg-2 control-label">Nome Completo</label>
              <div class="col-lg-10">
                <input id="user_nome" name="nome" class="form-control" maxlength="100">
                <span class="help-block"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-2 control-label">E-mail</label>
              <div class="col-lg-10">
                <input id="user_email" name="email" class="form-control" maxlength="100">
                <span class="help-block"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-2 control-label">Senha</label>
              <div class="col-lg-10">
                <input type="password" id="password" name="password" class="form-control">
                <span class="help-block"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-2 control-label">Confirmar Senha</label>
              <div class="col-lg-10">
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                <span class="help-block"></span>
              </div>
            </div>

            <div class="form-group text-center">
              <button type="submit" id="btn_save_user" class="btn btn-primary">
                <i class="fa fa-save"></i>&nbsp;&nbsp;Salvar
              </button>
              <span class="help-block"></span>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<script type="text/javascript" src="<?php echo site_url('recursos/js/sweetalert2.all.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo site_url('recursos/js/dataTables.bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo site_url('recursos/js/datatables.min.js') ?>"></script>

<script src="<?php echo site_url('recursos/'); ?>js/util.js"></script>
<script src="<?php echo site_url('recursos/'); ?>js/restrict.js"></script>

<script>
$(document).ready(function() {
  $("#btn_upload_site_img").on('change', function(e) {
    e.preventDefault();
    src_before = $('#site_img_path').attr("src");
    let form = $('#form_site').get(0);
    let formData = new FormData(form);    
    $.ajax({
      type: 'POST',
      url: '<?=site_url('restrict/site_upload'); ?>',
      data: formData,
      dataType: 'json',
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function() {
        clearErrors();
		    $('#site_img_path').siblings(".help-block").html(loadingImg("Carregando imagem..."));
      },
      success: function(response) {
        clearErrors();
		    if (response["status"]) {
          $('#site_img_path').attr("src", '<?php echo site_url(); ?>' + 'sites/' + response["img_path"]);
			    $('#site_img_path').val('<?php echo site_url(); ?>' + 'sites/' + response["img_path"]);
		    } else {
			    $('#site_img_path').siblings(".help-block").html(response["error"]);
		    }
      },
      error: function() {
        $('#site_img_path').attr("src", src_before);
      }
    });
  });

});
</script>

<?= $this->endSection() ?>