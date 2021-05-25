<?php 

	class Painel
	{
		
		public static $cargos = [
			'0'=> 'Normal',
			'1'=> 'Moderador',
			'2'=> 'Administrador'
		];

		public static function logado(){
			return isset($_SESSION['login']) ? true : false;
		}

		public static function logout(){
			setcookie('lembrar', false, time()-1,'/');
			setcookie('username', false, time()-1,'/');
			setcookie('password', false, time()-1,'/');
			session_destroy();
			header('Location: '.INCLUDE_PATH_PAINEL);
		}

		public static function loadPage(){
			if (isset($_GET['url'])) {
				$url = explode('/', $_GET['url']);
				if (file_exists('pages/'.$url[0].'.php')) {
					include('pages/'.$url[0].'.php');
				}
				else{
					header('Location: '.INCLUDE_PATH_PAINEL);
				}
			}
			else{
				include('pages/home.php');
			}
		}

		public static function listUsersOnline(){
			self::clearUsersOnline();
			$sql = MySql::connect()->prepare("SELECT * FROM `tb_admin.online`");
			$sql->execute();
			return $sql->fetchAll();
		}

		public static function clearUsersOnline(){
			$date = date('Y-m-d H:i:s');
			$sql = MySql::connect()->exec("DELETE FROM `tb_admin.online` WHERE ultima_acao < '$date' - INTERVAL 1 MINUTE");			
		}

		public static function alert($tipo, $mensagem){

			if ($tipo == "sucesso") {
				echo '<div class="alert alert-success"><i class="fas fa-check"></i> '.$mensagem.'</div>';
			}
			elseif ($tipo == "erro") {
				echo '<div class="alert alert-danger"><i class="fas fa-times"></i> '.$mensagem.'</div>';
			}

		}

		public static function validateImage($image){

			if ($image['type'] == 'image/jpeg' || $image['type'] == 'image/jpg' || $image['type'] == 'image/png') {
				$tamanho = intval($image['size']/1024);
				if ($tamanho < 300) {
					return true;
				}
				else{
					return false;
				}
			}
			else{
				return false;
			}

		}

		public static function uploadFile($file){
			$formatoArquivo = explode('.', $file['name']);
			$uniqueName = uniqid().'.'.$formatoArquivo[count($formatoArquivo)-1];
			if (move_uploaded_file($file['tmp_name'], BASE_DIR_PAINEL.'/uploads/'.$uniqueName)) {
				return $uniqueName;
			}
			else{
				return false;
			}
		}

		public static function deleteFile($file){
			@unlink('uploads/'.$file);
		}
	}

?>