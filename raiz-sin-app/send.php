<?php
session_start();
$refe = '';
if (empty($_POST)) {
	$input = file_get_contents('php://input');
	$data = json_decode($input, true);

	if (json_last_error() === JSON_ERROR_NONE) {
		$nombre = isset($data['fromName']) ? htmlspecialchars(trim($data['fromName'])) : $nombre;
		$email = isset($data['from']) ? filter_var(trim($data['from']), FILTER_SANITIZE_EMAIL) : $email;
		$telefono = isset($data['telefono']) ? htmlspecialchars(trim($data['telefono'])) : '';
		$mensaje = isset($data['message']) ? htmlspecialchars(trim($data['message'])) : $mensaje;
		$asunto = isset($data['subject']) ? htmlspecialchars(trim($data['subject'])) : $asunto;
		$destinatario = isset($data['to']) ? htmlspecialchars(trim($data['to'])) : $destinatario;
		$post_ref = isset($data['ref']) ? htmlspecialchars(trim($data['ref'])) : $ref;
	}
} else {
	// Intenta obtener datos de $_POST
	$nombre = isset($_POST['fromName']) ? htmlspecialchars(trim($_POST['fromName'])) : null;
	$email = isset($_POST['from']) ? filter_var(trim($_POST['from']), FILTER_SANITIZE_EMAIL) : null;
	$telefono = isset($_POST['telefono']) ? htmlspecialchars(trim($_POST['telefono'])) : null;
	$mensaje = isset($_POST['message']) ? htmlspecialchars(trim($_POST['message'])) : null;
	$asunto = isset($_POST['subject']) ? htmlspecialchars(trim($_POST['subject'])) : null;
	$destinatario = isset($_POST['to']) ? htmlspecialchars(trim($_POST['to'])) : null;
	$post_ref = isset($data['ref']) ? htmlspecialchars(trim($data['ref'])) : null;
}


if (isset($_SERVER['HTTP_ORIGIN'])) {
	// Specify allowed domains
	$allowed_domains = ['*'];

	if (in_array($_SERVER['HTTP_ORIGIN'], $allowed_domains)) {
		header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
		header('Access-Control-Allow-Credentials: true');
	}
}

// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
	if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) {
		// Allow the method (e.g., POST)
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
	}

	if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
		// Allow the headers
		header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
	}

	exit(0);
}

require("PHPMailerAutoload.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {


	$ref = $_SERVER['HTTP_REFERER'];
	$refname = '';
	if (strstr($ref, 'sens-palermogreen') !== FALSE) {
		$refname = 'ATV25';
		$refe = '5053635';
	} elseif (strstr($ref, 'sens-humboldt') !== FALSE) {
		$refname = 'ATV19';
		$refe = '5472762';
	} elseif (strstr($ref, 'humboldt') !== FALSE) {
		$refname = 'ATV19';
		$refe = '5472762';
	} elseif (strstr($ref, 'sens-costa-rica') !== FALSE) {
		$refname = 'ATV20';
		$refe = '5477099';
	} elseif (strstr($ref, 'costa-rica') !== FALSE) {
		$refname = 'ATV20';
		$refe = '5477099';
	} elseif (strstr($ref, 'liv-guatemala-5880') !== FALSE) {
		$refname = 'ATV24';
		$refe = '5490816';
	} elseif (strstr($ref, 'liv-plaza') !== FALSE) {
		$refname = 'ATV23';
		$refe = '5457541';
	} elseif (strstr($ref, 'liv-thames') !== FALSE) {
		$refname = 'ATV22';
		$refe = '5053637';
	}
	if (isset($post_ref) && !empty($post_ref)) {
		$refe = intval($post_ref);
	}

	//echo $ref;

	$mail = new PHPMailer();
	//$mail->SMTPDebug  = 4;
	$mail->IsSMTP();
	$mail->Host = "vcl301.wnpservers.net"; // SMTP a utilizar. Por ej. smtp.elserver.com
	$mail->Username = "noreply@atvarquitectos.com"; // Correo completo a utilizar
	$mail->Password = "noreplyatv2018"; // Contraseña
	$mail->SMTPAuth   = true;
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587; // Puerto a utilizar
	$mail->From = "noreply@atvarquitectos.com"; // Desde donde enviamos (Para mostrar)
	$mail->FromName = $nombre;
	$mail->addReplyTo($email);
	$mail->AddAddress($destinatario); // Esta es la dirección a donde enviamos
	$mail->AddAddress('comercial@atvarquitectos.com'); // Esta es la dirección a donde enviamos
	// $mail->AddBCC("franciscologiudice@gmail.com"); // Esta es la dirección a donde enviamos

	$mail->IsHTML(true); // El correo se envía como HTML
	$mail->CharSet = 'UTF-8';
	$mail->Subject = $asunto; // Este es el titulo del email.
	$body = "";
	$body .= (isset($telefono) ? "Telefono: " . $telefono . "<br><br>" : '');
	$body .= $mensaje;
	$mail->Body = $mensaje;
	$exito = $mail->Send(); // Envía el correo.

	if ($exito) {
		echo "success";



		$email = $email;

		$logdata = $email . PHP_EOL;
		//$nombre = $nombr;
		$tel = '';
		$msg = $mensaje;
		if (isset($_POST['dta'])) {
			$logdata .= $_POST['dta'] . PHP_EOL;
			$data = base64_decode($_POST['dta']);
			$dataex = explode("//", $data);
			$nombre = $dataex[0];
			$email = $dataex[1];
			$tel = $dataex[2];
			$msg = $dataex[3];
		}


		$source  = (isset($_SESSION['utm_source']) ? strval($_SESSION['utm_source']) : '');
		$medium  = (isset($_SESSION['utm_medium']) ? strval($_SESSION['utm_medium']) : '');
		$campaign = (isset($_SESSION['utm_campaign']) ? strval($_SESSION['utm_campaign']) : '');
		$content = (isset($_SESSION['utm_content']) ? strval($_SESSION['utm_content']) : '');
		$keyword = (isset($_SESSION['utm_term']) ? strval($_SESSION['utm_term']) : '');


		if (isset($_POST['utm_source'])) {
			$source  = (isset($_POST['utm_source']) ? strval($_POST['utm_source']) : '');
			$medium  = (isset($_POST['utm_medium']) ? strval($_POST['utm_medium']) : '');
			$campaign = (isset($_POST['utm_campaign']) ? strval($_POST['utm_campaign']) : '');
			$content = (isset($_POST['utm_content']) ? strval($_POST['utm_content']) : '');
			$keyword = (isset($_POST['utm_term']) ? strval($_POST['utm_term']) : '');
		}

		$apiEndpoint = "http://www.tokkobroker.com/api/v1/webcontact/?key=16860a1ed64d3ecbf6779de8644035305fe6d988";

		// Example data for the contact form
		$contactFormData = array(
			"api_key" => "16860a1ed64d3ecbf6779de8644035305fe6d988",
			"name" => mb_convert_encoding(($nombre), 'UTF-8', 'ISO-8859-1'),
			"cellphone" => mb_convert_encoding($tel, 'UTF-8', 'ISO-8859-1'),
			"phone" => mb_convert_encoding($tel, 'UTF-8', 'ISO-8859-1'),
			"email" => mb_convert_encoding(strval($email), 'UTF-8', 'ISO-8859-1'),
			"work_name" => "",
			"text" => mb_convert_encoding(strval($msg), 'UTF-8', 'ISO-8859-1'),
			"developments" => [$refe],
			"tags" => ['web'],
			"agent_mail" => ""
		);
		$ch = curl_init($apiEndpoint);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($contactFormData));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_VERBOSE, true);
		$response = curl_exec($ch);
		//list($headers, $body) = explode("\r\n\r\n", $response, 2);
		curl_close($ch);


		/* $ajax = array(
			"firstName" => utf8_encode(($nombre)),
			"lastName" => "",
			"email"  => utf8_encode(strval($email)),
			"message"  => utf8_encode(strval($msg)),
			"phoneNumber"  => utf8_encode($tel),
			"source"  => utf8_encode(strval($source)),
			"medium"  => utf8_encode(strval($medium)),
			"campaign" => utf8_encode(strval($campaign)),
			"content" => utf8_encode(strval($content)),
			"keyword" => utf8_encode(strval($keyword)),
			"RealEstate" => utf8_encode(strval($refname))
		);
		
		$rajax = print_r($ajax, true);



		$logdata .= $rajax;
		$logdata .= PHP_EOL;

		$logdata .= "LANDING";
		$logdata .= PHP_EOL;
		$logdata .= json_encode($ajax);
		$logdata .= PHP_EOL;

		$logdata .= json_last_error_msg();
		$logdata .= PHP_EOL;

		if(json_encode($ajax)){
			$curl = curl_init();
		
			curl_setopt_array($curl, array(
			CURLOPT_URL => "https://prismatic.net.ar/Atv/Svc/api/Mkt",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS =>json_encode($ajax),
			CURLOPT_HTTPHEADER => array(
				"ATV-APIKEY-TEST: ATV-TEST-2020",
				"Content-Type: application/json"
			),
			));
		
			$response = curl_exec($curl);
			$logdata .= $response.PHP_EOL;
		
			curl_close($curl);
		}
		$logdata.="===============================================".PHP_EOL;
		$fp = fopen('log.txt', 'a');//opens file in append mode  
		fwrite($fp,$logdata);  
		fclose($fp);  */
	} else {
		echo $mail->ErrorInfo;
	}
}
