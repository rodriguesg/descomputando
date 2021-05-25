<?php include('config.php'); ?>
<?php Site::updateUserOnline(); ?>
<?php Site::countVisitors();?>
<!DOCTYPE html>
<html>
<head>
	<title>Descomputando</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH; ?>estilo/style.css">
	<link rel="icon" type="image/x-icon" href="<?php echo INCLUDE_PATH;?>favicon.ico">
	<script src="https://kit.fontawesome.com/c1f5d3c5c5.js" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Descricao do meu site">
	<meta name="keywords" content="palavras,chave">
	<meta charset="utf-8">
</head>
<body>
	<base base='<?php echo INCLUDE_PATH; ?>' />
	<?php  

		$url = isset($_GET['url']) ? $_GET['url'] : 'home';
		switch ($url) {
			case 'sobre':
				echo "<target target='sobre' />";
				break;
			case 'servicos':
				echo "<target target='servicos' />";
				break;
		}
	?>
	<div class="success">
		Formulário enviado com sucesso!
	</div>
	<div class="error">
		Erro ao enviar o formulário!
	</div>
	<div class="overlay-loading">
		<img src="<?php echo INCLUDE_PATH; ?>images/ajax-loader.gif">
	</div>

	<!--/php new Email(); ?> -->
	<header>
		<div class="logo">
				<a href="/Projeto_01">
					<img src="<?php echo INCLUDE_PATH; ?>images/logo.png">
				</a>
		</div>				
		<div class="center">

			<nav class="desktop right">
				<ul>
					<li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>sobre">Sobre</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
				</ul>
			</nav>

			<nav class="mobile right">
				<div class="botao-menu-mobile">
					<i class="fas fa-bars" aria-hidden="true"></i>
				</div>
				<ul>
					<li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>sobre">Sobre</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
				</ul>
			</nav>
			<div class="clear"></div>
		</div>
	</header>
	
	<?php  		

		if (file_exists('pages/'.$url.'.php')) {
			include('pages/'.$url.'.php');
##			if ($url == 'contato') {
##				$pagina404 = true;
##			}
		}else{
			if ($url != 'sobre' && $url != 'servicos') {
				$pagina404 = true;
				include('pages/404.php');
			}
			else{
				include('pages/home.php');
			}
			
		}

	?>

	<footer <?php  if (isset($pagina404) && $pagina404 == true) echo 'class="fixed"';?>>
		<div class="center">
			<p>Descomputando - Todos os direitos reservados.®</p>
		</div>
	</footer>
</body>
<script src="<?php echo INCLUDE_PATH; ?>js/jquery-3.6.0.min.js"></script>
<script src="<?php echo INCLUDE_PATH; ?>js/scripts.js"></script>
<script src="<?php echo INCLUDE_PATH; ?>js/constants.js"></script>
<script src="<?php echo INCLUDE_PATH; ?>js/slider.js"></script>
<script src="<?php echo INCLUDE_PATH; ?>js/formularios.js"></script>
<?php  
	if($url == 'contato'){

?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0ur_eeO8SggOBuP9lJ3tjaD_LjK2DjRU"></script>
<script src="<?php echo INCLUDE_PATH; ?>js/map.js"></script>
<?php  
	}
?>
</html>