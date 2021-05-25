<?php  
	
	class Site
	{
		
		public static function updateUserOnline(){
			if (isset($_SESSION['online'])) {
				$token = $_SESSION['online'];
				$horarioAtual = date('Y-m-d H:i:s');
				$check = MySql::connect()->prepare("SELECT `id` FROM `tb_admin.online` WHERE token = ?");
				$check->execute(array($token));

				if ($check->rowCount() == 1) {
					$sql = MySql::connect()->prepare("UPDATE `tb_admin.online` SET ultima_acao = ? WHERE token = ?");
					$sql->execute(array($horarioAtual, $token));					
				}
				else{
					$token = $_SESSION['online'];
					$horarioAtual = date('Y-m-d H:i:s');
					$ip = $_SERVER['REMOTE_ADDR'];
					$sql = MySql::connect()->prepare("INSERT INTO `tb_admin.online` VALUES (null,?,?,?)");
					$sql->execute(array($ip, $horarioAtual, $token));	
				}		
			}
			else{
				$_SESSION['online'] = uniqid();
				$token = $_SESSION['online'];
				$horarioAtual = date('Y-m-d H:i:s');
				$ip = $_SERVER['REMOTE_ADDR'];
				$sql = MySql::connect()->prepare("INSERT INTO `tb_admin.online` VALUES (null,?,?,?)");
				$sql->execute(array($ip, $horarioAtual, $token));				
			}
		}

		public static function countVisitors(){
			if (!isset($_COOKIE['visita'])) {
				setcookie('visita','true',time() + (60*60*24*7));
				$sql = MySql::connect()->prepare("INSERT INTO `tb_admin.visitas` VALUES (null,?,?)");
				$sql->execute(array($_SERVER['REMOTE_ADDR'],date('Y-m-d')));
			}
		}
	}

?>