<?php  
	include('../config.php');
	$data = array();
	$subject = 'Nova mensagem do site';
	$body = '';

	foreach ($_POST as $key => $value) {
		$body.=ucfirst($key).": ".$value;
		$body.="<hr>";
	}

	$mail = new Email('mail.descomputando.com.br', 'gabriel-rodrigues@descomputando.com.br', '1qa2ws3ED*', 'Gabriel');
	$mail->addAddress('contato.descomputando@gmail.com', 'Gabriel');
	$info = array('subject' => $subject, 'body' => $body);	
	$mail->formatMail($info);
	if ($mail->send_mail()) {
	  	$data['success'] = true;
	  	$data['error'] = false;
    }
    else{
    	$data['success'] = false;
  		$data['error'] = true;
    }
   
    die(json_encode($data));
?>