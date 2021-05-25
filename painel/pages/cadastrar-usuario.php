<?php 
	checkPagePermission(2);
 ?>

<section class="box-content row">
	<h2> <i class="fas fa-edit"></i> Cadastrar usuário</h2>

	<form method="post" enctype="multipart/form-data">
	  <?php  

	  	if (isset($_POST['acao'])) {
	  		
	  		$username = $_POST['username']; 
	  		$nome = $_POST['name'];
	  		$password = $_POST['password'];
	  		$imagem = $_FILES['image'];
	  		$cargo = $_POST['role'];	  		
	  		
  			if (Painel::validateImage($imagem) == false) {
  				Painel::alert('erro','O formato não é válido, formatos válidos são JPG, JPEG e PNG.');	
  			}
  			elseif (Usuario::userExists($username)) {
  				Painel::alert('erro', 'O Usuário '.$username.' já está cadastrado.');
  			}
  			else {
  				$usuario = new Usuario();
  				$image = Painel::uploadFile($imagem);
  				$usuario->addUser($username,$password,$image,$nome,$cargo);
  				Painel::alert('sucesso','O cadastro do usuário '.$username.' foi realizado com sucesso!');	
  			}
	  		
	  	}

	  ?>

	  <div class="mb-3">
	    <input type="text" name="name" class="form-control" placeholder="Nome" required>
	  </div>
	  <div class="input-group mb-3">
	  	<span class="input-group-text" id="addon-wrapping">@</span>
	 	<input type="text" class="form-control" name="username" placeholder="Usuário" aria-label="Username">
	  </div>
	  <div class="mb-3">
	    <input type="password" name="password" placeholder="Senha" class="form-control" required>
	  </div>
	  <div class="mb-3">
	  	<select name="role" class="form-select form-select mb-3" aria-label=".form-select-sm example">
	  		<option style="color: grey;" value="" disabled selected>Cargo</option>
		  <?php 
		  	foreach (Painel::$cargos as $key => $value) {
		  		if ($key <= $_SESSION['cargo'] && $_SESSION['cargo'] != 1) echo '<option value="'.$key.'">'.$value.'</option>';
		  	}

		   ?>
		</select>
	  </div>
	  <div class="mb-3">
	    <input type="file" name="image" class="form-control" placeholder="Imagem de perfil" required>
	  </div>
	  <button type="submit" name="acao" value="Atualizar" class="btn btn-primary">Cadastrar</button>	
	</form>
</section>