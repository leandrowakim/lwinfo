<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Área Restrita |<?php echo $this->renderSection('titulo'); ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
		<link href="<?php echo site_url('recursos/'); ?>css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link href="<?php echo site_url('recursos/'); ?>css/owl.carousel.css" rel="stylesheet">
		<link href="<?php echo site_url('recursos/'); ?>css/owl.theme.default.min.css"  rel="stylesheet">
		<link href="<?php echo site_url('recursos/'); ?>css/style.css" rel="stylesheet">
		<script src="<?php echo site_url('recursos/'); ?>js/ie-emulation-modes-warning.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('recursos/vendor/datatable/datatables-combinado.min.css') ?>" />
		<?php if (isset($styles)) {
         foreach ($styles as $style_name) {
            $href = site_url('recursos/') . "css/" . $style_name;?>
				<link href="<?php echo $href?>" rel="stylesheet">
			<?php }
      }?>
    <!-- Espaço reservado para renderizar os estilos de cada view que estender esse layout-->
    <?php echo  $this->renderSection('estilos'); ?>
  </head>
  <body>        
    <!-- Espaço reservado para renderizar o conteudo de cada view que estender esse layout-->
    <?php echo  $this->renderSection('conteudo'); ?>
    
    <footer>
      <div class="container text-center">
        <p><span>LW Informática-ME</span> &copy; <?php echo date('Y'); ?></p>
      </div>
    </footer>
    <!-- JavaScript files-->
    <script src="<?php echo site_url('recursos/');?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo site_url('recursos/');?>vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?php echo site_url('recursos/');?>vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo site_url('recursos/');?>vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?php echo site_url('recursos/');?>js/front.js"></script>
    <script type="text/javascript" src="<?php echo site_url('recursos/vendor/datatable/datatables-combinado.min.js') ?>"></script>
    <!--Espaço reservado para renderizar os scripts de cada view que estender esse layout-->
    <?php echo  $this->renderSection('scripts'); ?>
  </body>
</html>