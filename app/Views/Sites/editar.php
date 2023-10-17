<?php echo $this->extend('Layout/principal_restrict'); ?>

<?php echo $this->section('titulo'); ?> <?php echo $titulo; ?> <?php echo $this->endSection(); ?>

<?php echo $this->section('estilos'); ?>

<?php echo $this->endSection(); ?>

<?php echo $this->section('conteudo'); ?>

<nav class="navbar navbar-default navbar-shrink navbar-fixed-top">
   <div class="text-center">
      <span><?php echo $titulo; ?></h2>
   </div>
</nav>

<section style="min-height: calc(100vh - 83px)" class="light-bg">
   <div class="container">
      <div class="card">
        <div class="card-header">
         <div class="row">
            <div class="col-lg-12">
            
            </div>
         </div>
      </div>
      <div class="card-body">
         <div class="row">
            <div class='col-lg-2'></div>
            <div class='col-lg-8'>
               <?php echo form_open_multipart('', ['id' => 'form'], ['id' => $site->id]); ?>
                  <?php echo $this->include('Sites/_form'); ?>

                  <div class="form-group mt-5 mb-2 col-lg-8">
                     <input id="btn-salvar" type="submit" value="Salvar" class="btn btn-primary btn-sm mr-2">
                     <a href="<?php echo site_url("site"); ?>" class="btn btn-secondary btn-sm ml-2">Voltar</a>
                  </div>

               <?php echo form_close(); ?>
            </div>
            <div class='col-lg-2'></div>
         </div>
      </div>
   </div>
</section>
<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<script>
   $(document).ready(function(){
      $("#form").on('submit',function(e){
         
         e.preventDefault();

         $.ajax({
            type: 'POST',
            url: '<?=site_url('site/atualizar'); ?>',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
               $('#btn-salvar').val('Aguarde...');
            },
            success: function(response){
               $('#btn-salvar').val('Salvar');
               $('#btn-salvar').removeAttr("disabled");
               if(!response.erro) {
                  //Tudo certo com a atualização do usuário
                  window.location.href = "<?php echo site_url("site"); ?>";
               } else {
                  //Erros de validação
                  $('#response').html('<div class="alert alert-danger">' + response.erro +'</div>');
               }
            },
            error: function() {
               alert('Não foi possível processar solicitação. Por favor entre em contato com o suporte!');               
               $('#btn-salvar').val('Salvar');
               $('#btn-salvar').removeAttr("disabled");
            },
         });
      });

      $("#form").submit(function() {
         $(this).find(":submit").attr('disabled', 'disabled');
      });

   });
</script>
<?php echo $this->endSection(); ?>