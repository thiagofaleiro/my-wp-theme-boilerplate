<?php
  global $utils;

  // Send contact
  $utils->send_contact = function($name, $email, $message)
  {
    // date_default_timezone_set('America/Sao_Paulo');
  	// session_start();

    // print_r($this);
    // print_r($GLOBALS['utils']->pages['contato']);
    // print_r($GLOBALS);
    // print_r($_SESSION);

    // print_r($GLOBALS);
    // echo $_POST["antispam"] . ' > '. $GLOBALS['antispam'];
    // echo $_SESSION["antispam"] . ' - ' . $_POST["antispam"];
    // echo get_bloginfo('name');
    // print_r($utils);
    // die;

    $enble_antispam = false;

    $json = (object)array(
      'ANTISPAM' => 'Session: '. $_SESSION["antispam"] .' / Post: ' . $_POST["antispam"]
    );

    // Form fields
    $antispam 	= $_POST["antispam"];
    $name      	= $_POST["name"];
    $email    	= $_POST["email"];
    $message  	= $_POST["message"];

    // More fields
    $date_time  = date("d/m/y - H:i");
    $ip        	= $_SERVER['REMOTE_ADDR'];
    $browser 	  = $_SERVER['HTTP_USER_AGENT'];

    // Getting errors
  	$errors = array();
    if (empty($name)) 		$errors[] = 'Nome';
  	if (empty($email)) 		$errors[] = 'E-mail';
    if (empty($message))  $errors[] = 'Mensagem';

  	// Checking Antispam
  	if ($enble_antispam && (!$_SESSION["antispam"] || $_SESSION["antispam"] != $antispam)) {
  		$json->error  = true;
  		$json->msg    = "Ops! Aguarde alguns instantes para enviar uma nova mensagem.";
  		$json->errors = array();

    // Sending email message
  	}
    else if(empty($errors))
    {
      $site_name = get_bloginfo('name');
      $send_to = get_field('form_email_to', $GLOBALS['utils']->pages['contato']->ID);


      $headers[] = "From: $site_name <contato@robertozagury.com.br>";
      $headers[] = "Reply-To: $email";
      $envia     = mail(
				$send_to,
        "Site Contato: $name",
        "Data: $date_time\n\nAssunto: $subject\nNome: $name\nE-mail: $email\n\nMensagem: $message",
        implode("\r\n", $headers)
      );

  		// Success
  		if ($envia) :
  			$json->error 	= false;
  			$json->msg 		= "<span>Agradecemos seu contato!</span> Sua mensagem foi enviada com sucesso e em breve será respondida. $send_to";
  		// Sending issues
  		else :
  			$json->error 	= true;
  			$json->msg 		= "<span>Ocorreu falha no momento do envio!</span> $send_to";
  		endif;

  	// Parsing Errors
  	}
    else
    {
      $json->error 	= true;
  		$json->msg 		= "<strong>Mensagem não enviada!</strong> Preencha corretamente os campos:";
  		$json->errors = $errors;
    }

  	// Return json result
    return $json;
  }
?>
