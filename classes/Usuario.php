<?php 

	class Usuario
	{
		
		public function updateUser($name,$password,$img){

			$sql = MySql::connect()->prepare("UPDATE `tb_admin.usuarios` SET nome = ?, password = ?, img = ? WHERE username = ?");
			if ($sql->execute(array($name,$password,$img,$_SESSION['username']))) {
				return true;
			}
			else{
				return false;
			}

		}

		public static function userExists($username){
			$sql = MySql::connect()->prepare("SELECT `id` from `tb_admin.usuarios` WHERE username = ?");
			$sql->execute(array($username));
			if ($sql->rowCount() == 1) {
				return true;
			}
			else{
				return false;
			}
		}

		public function addUser($username,$password,$image,$name,$role){
			$sql = MySql::connect()->prepare("INSERT INTO `tb_admin.usuarios` VALUES (null,?,?,?,?,?)");
			$sql->execute(array($username,$password,$image,$name,$role));
		}
	}

 ?>