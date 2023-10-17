<?= $this->extend('Layout/principal_restrict') ?>

<?= $this->section('titulo') ?> <?php echo $titulo ; ?> <?= $this->endSection() ?>

<?= $this->section('estilos') ?>

<?= $this->endSection() ?>

<?= $this->section('conteudo') ?>
	<nav class="navbar navbar-default navbar-shrink navbar-fixed-top">
		<div class="text-center">
			<span><?php echo $titulo; ?></h2>
		</div>
	</nav>
	<div class="login-page">
		<div class="container d-flex align-items-center">
			<div class="form-holder has-shadow">
				<section style="min-height: calc(100vh - 83px)" class="light-bg">
					<div class="container">
						<div class="row">
							<div class="col-lg-offset-3 col-lg-6 text-center">
								<div class="row">
									<div class="col-lg-12 text-center">
										<div class="section-title">
											<h2></h2>
										</div>
										<form id="login_form" method="post">
												
											<div class="form-group">
												<div class="input-group">
													<div class="input-group-addon">
														<span class="glyphicon glyphicon-user"></span>
													</div>
													<input type="text" placeholder="E-mail" id="email" name="email"
													class="form-control">
												</div>
												<span class="help-block"></span>
											</div>								
											
											<div class="form-group">
												<div class="input-group">

													<div class="input-group-addon">
														<span class="glyphicon glyphicon-lock"></span>
													</div>

													<input type="password" placeholder="Senha" name="password"
													class="form-control">
												</div>
											</div>
											
											<div class="form-group">
												<button type="submit" id="btn_login" class="btn btn-block">Login</button>
											</div>
											<span class="help-block"></span>

										</form> 
									</div>
								</div>
							</div>
						</div>

					</div>
				</section>
			</div>
		</div>
	</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<script src="<?php echo site_url('recursos/'); ?>js/util.js"></script>

<script>
	$(document).ready(function(){
		$(function() {
			$("#login_form").submit(function() {
				$.ajax({
					type: "post",
					url: '<?=site_url('login/ajax_login'); ?>',
					dataType: "json",
					data: $(this).serialize(),
					beforeSend: function() {
						clearErrors();
						$("#btn_login").parent().siblings(".help-block").html(loadingImg("Verificando..."));
					},
					success: function(json) {
						if (json["status"] == 1) {
							//clearErrors();
							$("#btn_login").parent().siblings(".help-block").html(loadingImg("Logando..."));
							window.location.href = "<?php echo site_url('site'); ?>";
						} else {
							showErrors(json["error_list"]);
						}
					},
					error: function(response) {
						console.log(response);
					}
				})
				return false;
			})
		})
	});
</script>

<?= $this->endSection() ?>