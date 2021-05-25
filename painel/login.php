<?php 

	if (isset($_COOKIE['lembrar'])) {
		$username = $_COOKIE['username'];
		$password = $_COOKIE['password'];
		$sql = MySql::connect()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE username = ? AND password = ?");
		$sql->execute(array($username,$password));
		if ($sql->rowCount()==1) {
			$info = $sql->fetch();
			$_SESSION['login'] = true;
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['cargo'] = $info['cargo'];
			$_SESSION['nome'] = $info['nome'];
			$_SESSION['img'] = $info['img'];
			header('Location: '.INCLUDE_PATH_PAINEL);
			die();			
		}

	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Painel de controle</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH_PAINEL; ?>css/style.css">
</head>
<body>
	<div style="height: 40%;" class="d-flex justify-content-center">
	 	<img src="../images/logo.png" alt="...">
	</div>

	<div class="box-login">
		<?php
			if (isset($_POST['acao'])) {
				$username = $_POST['username'];
				$password = $_POST['password'];

				$sql = MySql::connect()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE username = ? AND password = ?");
				$sql->execute(array($username,$password));
				if ($sql->rowCount()==1) {
					$info = $sql->fetch();
					$_SESSION['login'] = true;
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					$_SESSION['cargo'] = $info['cargo'];
					$_SESSION['nome'] = $info['nome'];
					$_SESSION['img'] = $info['img'];
					if (isset($_POST['lembrar'])) {
						setcookie('lembrar', true, time()+(60*60*24), '/');
						setcookie('username', $username, time()+(60*60*24), '/');
						setcookie('password', $password, time()+(60*60*24), '/');
					}
					header('Location: '.INCLUDE_PATH_PAINEL);
					die();
				}
				else{
					echo '<div class="alert alert-danger" role="alert">Usuário ou senha incorretos!</div>';
				}
			}
			
		?>
		<h2>Painel de Controle Descomputando</h2>
		<form method="post">			
			<div class="mb-3">
			    <input type="text" class="form-control" name="username" placeholder="Usuário..." aria-describedby="emailHelp">
		    </div>
			<div class="mb-3">		    	
			    <input type="password" class="form-control" name="password" placeholder="Senha...">
			</div>
			<div class="d-flex justify-content-center">
				<button style="width: 100%;" type="submit" name="acao" value="Logar" class="btn btn-primary">Logar</button>	
			</div>
			<div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="lembrar">
                <label class="form-check-label" for="flexSwitchCheckDefault">Lembrar-me</label>
            </div>
		</form>

	</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</html>