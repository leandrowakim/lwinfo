<?= $this->extend('Layout/principal') ?>

<?= $this->section('titulo') ?> <?php echo $titulo ; ?> <?= $this->endSection() ?>

<?= $this->section('estilos') ?>

<?= $this->endSection() ?>

<?= $this->section('conteudo') ?>

	<header>
		<div class="container">
			<div class="slider-container">
				<div class="intro-text">
					<div class="intro-lead-in">Estudos qualificados</div>
					<div class="intro-heading"></div>
					<a href="<?php echo site_url(); ?>#site" class="page-scroll btn btn-xl">Conheça meus sites</a>
				</div>
			</div>
		</div>
	</header>

	<section id="about" class="light-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="section-title">
						<h2>SOBRE</h2>
						<p>Aqui estão alguns dos meus sites públicos que desenvolvi estudando PHP e CodeIginter 4</p>
					</div>
				</div>
			</div>
			
		</div>
	</section>

	<section class="overlay-dark bg-img1 dark-bg short-section">
		<div class="container text-center">
			<div class="row">
				<div class="col-md-offset-3 col-md-3 mb-sm-30">
					<div class="counter-item">
						<a class="page-scroll" href="#site">
							<h6>Sites</h6>
						</a>
					</div>
				</div>
				<div class="col-md-3 mb-sm-30">
					<div class="counter-item">
						<a class="page-scroll" href="#team">
							<h6>Equipe</h6>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="site" class="light-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="section-title">
						<h2>Sites</h2>
						<p></p>
					</div>
				</div>
			</div>
			<div class="row">			
				<?php 
					if (!empty($sites)) {
						foreach ($sites as $site) { ?>
							<div class="col-md-4">
								<div class="ot-portfolio-item">
									<figure class="effect-bubba">
										<img src="<?=site_url().$site["site_img"]?>" alt="img02" class="img-responsive center-block"/>
										<figcaption>
											<a href="#" data-toggle="modal" data-target="#site_<?=$site["site_id"]?>"></a>
										</figcaption>
									</figure>
								</div>
							</div>

							<div class="modal fade" id="site_<?=$site["site_id"]?>" tabindex="-1" role="dialog" aria-labelledby="Modal-label-1">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="X"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="Modal-label-1"><?=$site["site_name"]?></h4>
										</div>
										
										<div class="modal-body">
											<img src="<?=site_url().$site["site_img"]?>" alt="img01" class="img-responsive center-block" />
											<div class="modal-works"><span>Duração: <?=intval($site["site_duration"])?> (h)</span></div>
											<p><?=$site["site_description"]?></p>
										</div>
										
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
										</div>
									</div>
								</div>
							</div>
				<?php 
						} // FOREACH
					} // IF 
				?>
			</div>
		</div>
	</section>
	<section id="team" class="light-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="section-title">
						<h2>Equipe</h2>
						<p></p>
					</div>
				</div>
			</div>
			<div class="row">
				<?php 
				if (!empty($team)) {
					foreach ($team as $member) { ?>

						<div class="col-md-3">
							<a href="#" data-toggle="modal" data-target="#member_<?=$member["member_id"]?>">
								<div class="team-item">
									<div class="team-image">
										<img src="<?=site_url().$member["member_photo"]?>" class="img-responsive img-circle center-block" alt="author">
									</div>
									<div class="team-text">
										<h3><?=$member["member_name"]?></h3>
									</div>
								</div>
							</a>
						</div>

						<div class="modal fade" id="member_<?=$member["member_id"]?>" tabindex="-1" role="dialog" aria-labelledby="Modal-label-1">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="Modal-label-1"><?=$member["member_name"]?></h4>
									</div>
									
									<div class="modal-body">
										<img src="<?=site_url().$member["member_photo"]?>" alt="img01" class="img-responsive center-block" />
										<p><?=$member["member_description"]?></p>
									</div>
									
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
									</div>
								</div>
							</div>
						</div>
				<?php } // FOREACH
				} // IF ?>
			</div>
		</div>
	</section>
	<section id="contact">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="section-title">
						<h2>Contato</h2>
						<p>Entre em contato por aqui.<br>Tentaremos responder o mais rápido possível</p>
					</div>
				</div>
			</div>
			<div class="row">
				
				<div class="col-md-12">
					<form name="sentMessage" id="contactForm" novalidate="">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Seu nome *" id="name" required="" data-validation-required-message="Please enter your name.">
									<p class="help-block text-danger"></p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="email" class="form-control" placeholder="Seu email *" id="email" required="" data-validation-required-message="Please enter your email address.">
									<p class="help-block text-danger"></p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<textarea class="form-control" placeholder="Sua mensagem *" id="message" required="" data-validation-required-message="Please enter a message."></textarea>
									<p class="help-block text-danger"></p>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="row">
							<div class="col-lg-12 text-center">
								<div id="success"></div>
								<button type="submit" class="btn">Enviar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<p id="back-top">
		<a href="#page-top"><i class="fa fa-angle-up"></i></a>
	</p>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<?= $this->endSection() ?>
