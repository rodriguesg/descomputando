<section class="box-content row">
	<h2> <i class="fas fa-edit"></i> Cadastrar serviço</h2>

	<form method="post" enctype="multipart/form-data">
	  <?php  

	  	if (isset($_POST['acao'])) {

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
	    <input type="file" name="image" class="form-control" placeholder="Imagem de perfil" required>
	  </div>
	  <button type="submit" name="acao" value="Atualizar" class="btn btn-primary">Cadastrar</button>	
	</form>
</section>