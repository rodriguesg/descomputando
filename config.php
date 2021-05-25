<?php

	session_start();
	date_default_timezone_set('America/Sao_Paulo');
	$autoload = function($class){
		include('classes/'.$class.'.php');	
	};

	spl_autoload_register($autoload);

	define('INCLUDE_PATH', 'http://localhost/Projeto_01/');
	define('INCLUDE_PATH_PAINEL', INCLUDE_PATH.'painel/');
	define('HOST', 'localhost');
	define('USER', 'root');
	define('PASSWORD', '');
	define('DATABASE', 'projeto_01');

	define('BASE_DIR_PAINEL', __DIR__.'/painel');

	define('NOME_EMPRESA', 'Descomputando');

	function getCargo($indice){
		return Painel::$cargos[$indice];
	}

	function selecionadoMenu($par){
		$url = explode('/', @$_GET['url'])[0];

		if ($url == $par) {
			echo 'class="menu-active"';
		}
	}

	function checkMenuPermission($permissao){
		if ($_SESSION['cargo'] == $permissao) {
			return;		
		}
		else{
			echo "style='display: none;'";
		}
	}

	function checkPagePermission($permissao){
		if ($_SESSION['cargo'] == $permissao) {
			return;		
		}
		else{
			include('painel/pages/permissao-negada.php');
			die();
		}
	}
?>