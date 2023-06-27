<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';
	require 'phpmailer/src/SMTP.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('ru', 'phpmailer/language/');
	$mail->IsHTML(true);

	

	//От кого письмо
	$mail->setFrom('contact@gleadly.com', 'Gleadly'); // Указать нужный E-mail
	//Кому отправить
	$mail->addAddress('votan14@gmail.com'); // Указать нужный E-mail
	$mail->addAddress('mail.gleadly.com'); // Указать нужный E-mail
	//Тема письма
	$mail->Subject = 'Hello! This is an application from the Gleadly';

	//Тело письма
	$body = '<h1>Application!</h1>';


$txt = " ";

	if(trim(!empty($_POST['name']))){
		$body.='<p><strong>Name:</strong> '.$_POST['name'].'</p>';        
	}
	if(trim(!empty($_POST['phone']))){
		$body.='<p><strong>Email:</strong> '.$_POST['mail'].'</p>';        
	}
	if(trim(!empty($_POST['leads']))){
		$body.='<p><strong>Number of leads:</strong> '.$_POST['leads'].'</p>';        
	}
	if(trim(!empty($_POST['country']))){
		$body.='<p><strong>Leads country:</strong> '.$_POST['country'].'</p>';        
	}
	if(trim(!empty($_POST['site']))){
		$body.='<p><strong>Site:</strong> '.$_POST['site'].'</p>';        
	}
	if(trim(!empty($_POST['info']))){
		$body.='<p><strong>Additional info:</strong> '.$_POST['info'].'</p>';        
	}
		


	$mail->Body = $body;
    
	//Отправляем
	if (!$mail->send()) {
		$message = 'Error';
	} else {
		$message = 'Success!';
		       
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
?>