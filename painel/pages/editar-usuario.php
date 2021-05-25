<section class="box-content row">
	<h2> <i class="fas fa-edit"></i> Editar usuário</h2>

	<form method="post" enctype="multipart/form-data">
	  <?php  

	  	if (isset($_POST['acao'])) {

	  		$usuario = new Usuario();
	  		$nome = $_POST['name'];
	  		$password = $_POST['password'];
	  		$imagem = $_FILES['image'];
	  		$imagem_atual = $_POST['current_image'];

	  		if ($imagem['name'] != '') {
	  			if (Painel::validateImage($imagem)) {
	  				Painel::deleteFile($imagem_atual);
	  				$imagem = Painel::uploadFile($imagem);
	  				if ($usuario->updateUser($nome,$password,$imagem)) {
	  					$_SESSION['img'] = $imagem;
	  					header("Refresh:0");
	  					Painel::alert('sucesso','Atualizado com sucesso!');	  			
		  			}
		  			else{
		  				Painel::alert('erro', 'Ocorreu um erro ao atualizar...');
		  			}
	  			}
	  			else{
	  				Painel::alert('erro', 'O formato não é válido, formatos válidos são JPG, JPEG e PNG.');
	  			}
	  		}
	  		else{
	  			$imagem = $imagem_atual;	  			

	  			if ($usuario->updateUser($nome,$password,$imagem)) {
	  				Painel::alert('sucesso','Atualizado com sucesso!');	  			
	  			}
	  			else{
	  				Painel::alert('erro', 'Ocorreu um erro ao atualizar...');
	  			}

	  		}
	  	}

	  ?>

	  <div class="mb-3">
	    <label for="InputName" class="form-label">Nome</label>
	    <input type="text" name="name" class="form-control" id="InputName" value="<?php echo $_SESSION['nome'];?>">
	  </div>
	  <div class="mb-3">
	    <label for="InputPassword1" class="form-label">Senha</label>
	    <input type="password" name="password" class="form-control" id="InputPassword1" value="<?php echo $_SESSION['password'];?>">
	  </div>
	  <div class="mb-3">
	  	<label for="inputGroupFile02" class="form-label">Imagem de perfil</label>
	    <input type="file" name="image" class="form-control" id="inputGroupFile02">
	    <input type="hidden" name="current_image" value="<?php echo $_SESSION['img'];?>">
	  </div>
	  <button type="submit" name="acao" value="Atualizar" class="btn btn-primary">Atualizar</button>	
	</form>
</section>