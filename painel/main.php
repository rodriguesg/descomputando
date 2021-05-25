
<?php 
	if (isset($_GET['logout'])) {
		Painel::Logout();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Painel de controle</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">	
	<script src="https://kit.fontawesome.com/c1f5d3c5c5.js" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="icon" type="image/x-icon" href="<?php echo INCLUDE_PATH;?>favicon.ico">
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH_PAINEL; ?>css/style.css">
</head>
<body>
	<div class="menu">
		<div class="user-box">
			<?php  
				if ($_SESSION['img'] == '') {					
			?>
			<div class="user-avatar">
				<i style="color: rgba(255,255,255,.55);" class="far fa-user"></i>
			</div>
			<?php  
				}
				else{
			?>		
			<div class="user-image">
				<img style="width: 130px; height: 130px;border-radius: 100px;" src="<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $_SESSION['img'];?>">
			</div>
			<?php  				
				}
			?>								
			<div class="user-name">
				<p><?php  echo $_SESSION['nome']; ?></p>
				<p><?php  echo getCargo($_SESSION['cargo']); ?></p>
			</div>
		</div>
		<div class="items-menu">
			<h2>Cadastro</h2>
			<a <?php echo selecionadoMenu('cadastrar-depoimento'); ?> href="<?php echo INCLUDE_PATH_PAINEL?>cadastrar-depoimento">Cadastrar depoimento</a>
			<a <?php echo selecionadoMenu('cadastrar-servico'); ?> href="<?php echo INCLUDE_PATH_PAINEL?>cadastrar-servico">Cadastrar Serviço</a>
			<a <?php echo selecionadoMenu('cadastrar-slides'); ?> href="">Cadastrar Slides</a>	
			<h2>Gestão</h2>
			<a <?php echo selecionadoMenu('listar-depoimentos'); ?> href="">Listar depoimentos</a>
			<a <?php echo selecionadoMenu('listar-servicos'); ?> href="">Listar Serviços</a>
			<a <?php echo selecionadoMenu('listar-slides'); ?> href="">Listar Slides</a>
			<h2>Administração do painel</h2>
			<a <?php echo selecionadoMenu('editar-usuario'); ?> href="<?php echo INCLUDE_PATH_PAINEL?>editar-usuario">Editar usuários</a>
			<a <?php echo selecionadoMenu('cadastrar-usuario'); ?> <?php checkMenuPermission(2)?> href="<?php echo INCLUDE_PATH_PAINEL?>cadastrar-usuario">Adicionar usuário</a>
			<h2>Configuração geral</h2>
			<a <?php echo selecionadoMenu('editar-site'); ?> href="">Editar Site</a>
		</div>
	</div>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <div class="container-fluid">
		  	<button class="navbar-toggler float-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarNavDropdown">
		      <div class="navbar-nav me-auto mb-2 mb-lg-0">

		      </div>
		      <div class="d-flex justify-content-end">
		      	<ul class="navbar-nav me-auto mb-2 mb-lg-0">
		      		<li class="nav-item">
		      			<a class="nav-link" aria-current="page" href="<?php echo INCLUDE_PATH_PAINEL?>"><i class="fas fa-home"></i> Página inicial</a>	    
		      		</li>
		      		
		      		<li class="nav-item">
		      			<a class="nav-link" aria-current="page" href="<?php echo INCLUDE_PATH_PAINEL?>?logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
		      		</li>		      		
		      	</ul>		        
		      </div>
		    </div>
		  </div>
		</nav>
	</header>
	<div class="content">

		<?php Painel::loadPage();?>

	</div>
</body>
<script src="<?php echo INCLUDE_PATH; ?>js/jquery-3.6.0.min.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL; ?>js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</html>