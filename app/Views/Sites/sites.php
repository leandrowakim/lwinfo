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
      <h1>Cadastro de sites</h1>
      <div class="card">
        <div class="card-header">
          <div class="row">
              <div class="col-lg-12">
                <div class="block">
                  <a href="<?php echo site_url('sites/criar');?>" class="btn btn-primary mb-4">Novo site</a>
                </div>
              </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="block">
                  <div class="table-responsive">
                    <table class="table table-striped table-sm" style="width: 100%;">
                      <thead>
                        <tr>
                          <th>Nome</th>
                          <th>Imagem</th>
                          <th>Site Url</th>
                          <th class="text-center">Ações</th>
                        </tr>
                        <?php foreach ($sites as $site): ?>
                          <tr>
                            <td><?php echo $site['nome'] ?></td>
                            <td><?php echo $site['imagem'] ?></td>
                            <td><?php echo $site['url'] ?></td>
                            <td class="text-center"><?php echo $site['acoes'] ?></td>
                          </tr>  
                        <?php endforeach; ?>
                      </thead>
                    </table>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<script type="text/javascript" src="<?php echo site_url('recursos/js/sweetalert2.all.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo site_url('recursos/js/dataTables.bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo site_url('recursos/js/datatables.min.js') ?>"></script>

<script>
</script>

<?= $this->endSection() ?>