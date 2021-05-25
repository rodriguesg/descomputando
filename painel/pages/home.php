<?php 
	$usersOnline = Painel::listUsersOnline();

	$getVisitors = MySql::connect()->prepare("SELECT * FROM `tb_admin.visitas`");
	$getVisitors->execute();
	$getVisitors = $getVisitors->rowCount();

	$getVisitorsToday = MySql::connect()->prepare("SELECT * FROM `tb_admin.visitas` WHERE dia = ?");
	$getVisitorsToday->execute(array(date('Y-m-d')));
	$getVisitorsToday = $getVisitorsToday->rowCount();	
	
 ?>
<section class="box-content row">
	<h2 class="panel-title"><i class="fas fa-home"></i> Painel de controle <?php  echo NOME_EMPRESA;?></h2>
	<div class="box-content alert alert-primary box-metrica-single col-sm">
		<div class="box-metrica-wraper">
			<h2>Usuários online</h2>
			<p><?php echo (count($usersOnline)); ?></p>	
		</div>
	</div>
	<div class="box-content alert alert alert-success box-metrica-single col-sm">
		<div class="box-metrica-wraper">
			<h2>Total de visitas</h2>
			<p><?php echo $getVisitors; ?></p>	
		</div>
	</div>
	<div class="box-content alert alert-dark box-metrica-single col-sm">
		<div class="box-metrica-wraper">
			<h2>Visitas hoje</h2>
			<p><?php echo $getVisitorsToday; ?></p>	
		</div>
	</div>
</section>

<section class="box-content row">
	<section class="box-content col">
		<h2 class="panel-title"><i class="fas fa-globe-americas"></i> Usuários online</h2>
		<table class="table table-dark table-striped">
			<thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">IP</th>
			      <th scope="col">Última ação</th>
			    </tr>
			</thead>
			 <tbody>
			 	<?php  
			 		foreach ($usersOnline as $key => $value) {
			 	?>
			    <tr>
			      <th scope="row"><?php  echo $key+1;?></th>
			      <td><?php echo $value['ip']; ?></td>
			      <td><?php echo $value['ultima_acao']; ?></td>
			    </tr>
			    <?php  
			 		}
			 	?>
			  </tbody>
		</table>
	</section>
	<section class="box-content col">
		<h2 class="panel-title"><i class="fas fa-globe-americas"></i> Usuários cadastrados</h2>
		<table class="table table-dark table-striped">
			<thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Nome</th>
			      <th scope="col">Cargo</th>
			    </tr>
			</thead>
			 <tbody>
			 	<?php
			 		$usuariosPainel = MySql::connect()->prepare("SELECT * FROM `tb_admin.usuarios`");
			 		$usuariosPainel->execute();
			 		$usuariosPainel = $usuariosPainel->fetchAll();  
			 		foreach ($usuariosPainel as $key => $value) {
			 	?>
			    <tr>
			      <th scope="row"><?php  echo $key+1;?></th>
			      <td><?php echo $value['username']; ?></td>
			      <td><?php echo getCargo($value['cargo']); ?></td>
			    </tr>
			    <?php  
			 		}
			 	?>
			  </tbody>
		</table>
	</section>
</section>



