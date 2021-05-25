<?php 
	//Load Composer's autoloader
	require "../vendor/autoload.php";
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	class Email
	{
		private $mailer;
		function __construct($host, $username, $password, $name)
		{			
			$this->mailer = new PHPMailer;
			$this->mailer->isSMTP();                                      // Set mailer to use SMTP
			$this->mailer->Host = $host;   	      
			$this->mailer->SMTPAuth = true;                               // Enable SMTP authentication
			$this->mailer->Username = $username;
			$this->mailer->Password = $password;
			$this->mailer->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
			$this->mailer->Port = 465;                                    // TCP port to connect to

			$this->mailer->setFrom($username, $name);			
			$this->mailer->isHTML(true);                                  // Set email format to HTML			
			$this->mailer->CharSet = 'UTF-8';
		}

		public function addAddress($email, $nome){
			$this->mailer->addAddress($email, $nome);     // Add a recipient
		}

		public function send_mail(){
			if ($this->mailer->send()) {
				return true;
			}
			else{
				return false;
			}
		}

		public function formatMail($info){
			$this->mailer->Subject = $info['subject'];
			$this->mailer->Body    = $info['body'];
			$this->mailer->AltBody = strip_tags($info['body']);
		}
	}

?>