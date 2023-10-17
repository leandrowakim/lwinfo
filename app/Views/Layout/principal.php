<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="favicon.ico">
		<title>LW Informática | <?php echo $this->renderSection('titulo'); ?></title>
		<link href="<?php echo site_url('recursos/'); ?>css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link href="<?php echo site_url('recursos/'); ?>css/owl.carousel.css" rel="stylesheet">
		<link href="<?php echo site_url('recursos/'); ?>css/owl.theme.default.min.css"  rel="stylesheet">
		<link href="<?php echo site_url('recursos/'); ?>css/style.css" rel="stylesheet">
		<script src="<?php echo site_url('recursos/'); ?>js/ie-emulation-modes-warning.js"></script>

		<?php if (isset($styles)) {
         foreach ($styles as $style_name) {
            $href = site_url('recursos/') . "css/" . $style_name;?>
				<link href="<?=$href?>" rel="stylesheet">
			<?php }
      }?>

      <!--Aqui será renderizado os dados de cada view que estender esse Layout-->
      <?php echo $this->renderSection('estilos') ?>
	</head>

	<body id="page-top">
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
					<a class="navbar-brand page-scroll" href=<?php echo site_url('/') ;?> class="navbar-brand">
                  <div class="brand-text brand-big visible text-uppercase" style="margin-top: 15px;">
                     <strong class="text-primary">Lw</strong><strong>Info</strong>
                  </div>
               </a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li class="hidden">
							<a href="#page-top"></a>
						</li>
						<li>
							<a class="page-scroll" href="<?php echo site_url(); ?>#about">Sobre</a>
						</li>
						<li>
							<a class="page-scroll" href="<?php echo site_url(); ?>#site">Sites</a>
						</li>
						<li>
							<a class="page-scroll" href="<?php echo site_url(); ?>#team">Equipe</a>
						</li>
						<li>
							<a class="page-scroll" href="<?php echo site_url(); ?>#contact">Contato</a>
						</li>
						<li>
							<a class="page-scroll" href="<?php echo site_url(); ?>login">Login</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

      <!--Aqui será renderizado os dados de cada view que estender esse Layout-->
      <?php echo $this->renderSection('conteudo') ?>

      <footer>
         <div class="container text-center">
            <p><a href="https://www.lwinfo.dev.br"><span>Leandro Wakim</span></a> | <?php echo date('Y'); ?> &copy; LW Informática-ME</p>
         </div>
      </footer>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
		<script src="<?php echo site_url('recursos/'); ?>js/bootstrap.min.js"></script>
		<script src="<?php echo site_url('recursos/'); ?>js/ie10-viewport-bug-workaround.js"></script>

      <!--Aqui será renderizado os dados de cada view que estender esse Layout-->
      <?php echo  $this->renderSection('scripts'); ?>

		<?php if (isset($scripts)) {
			foreach ($scripts as $script_name) {
				$src = site_url('recursos/') . "js/" . $script_name; ?>
				<script src="<?=$src?>"></script>
			<?php }
		} ?>

	</body>

</html>