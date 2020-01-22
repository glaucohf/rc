<?php 


$urlHotzapp = "https://hotzapp.me/api/pbl/?u=5c82cde480caee271071435c&k=ZnsUnMobeB1Dh49&s=OUTROS";
$sendHotzapp = true;

$name = "GlaucoTeste103";
$phone = "(21) 98780-8883";
$email = "glauc.ofiles@gmail.com";
$produto = "EC - POA";

$response = "Inicio <BR>";
echo $response;

//	 BEGIN HOTZAPP
// set post fields to email
if ($sendHotzapp){
	/*envio via post
	$post = [
		'name' => $name,
		'phone' => $phone,
		'email' => $email,
		'produto' = $produto
	];

	$ch = curl_init($urlHotzapp); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

	// execute!
	$responseHotzapp = curl_exec($ch);
	echo "responseHotzapp";
		
	// close the connection, release resources used
	curl_close($ch);

	// log do envio para hotzapp
	$msg2log = sprintf(  "Envio para hotzapp: Nome: %s , email: %s , telefone: %s " , $name, $email, $phone );
	logMsg( $msg2log );
	logMsg($response);
	*/
	
	//inicio envio json
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $urlHotzapp);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_HEADER, FALSE);

	curl_setopt($ch, CURLOPT_POST, TRUE);

	$fieldsTask="{
		 \"nome\":  \" $name \",
		\"telefone\": \" $phone \",
		\"email\": \" $email \",
		\"produto\": \" $produto \"
	}";

	curl_setopt($ch, CURLOPT_POSTFIELDS, $fieldsTask);

	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	  "Content-Type: application/json"
	));

	$response = curl_exec($ch);

	curl_close($ch);
	
	// log do envio para hotzapp
	$msg2log = sprintf(  "Envio para hotzapp: Nome: %s , email: %s , telefone: %s , produto: %s " , $name, $email, $phone, $produto );
	logMsg( $msg2log );
	logMsg($response);
	
}

//BEGIN FUNCTIONS
function read($file){
    $fp = fopen($file, "r");
    $conteudo = fread($fp, filesize($file));
    fclose($fp);
    return $conteudo;
}

function write($content, $writeFileName){
    $file = $writeFileName;
    $fp = fopen($file, "w+");
    fwrite($fp, $content);
    fclose($fp);
}

function logMsg( $msg, $level = 'info', $file = 'hotzapp.log' ){
    // log level (INFO, WARNING ou ERROR)
    $levelStr = '';
 
    // check log level
    switch ( $level )
    {
        case 'info':
            $levelStr = 'INFO';
            break;
 
        case 'warning':
             $levelStr = 'WARNING';
            break;
 
        case 'error':
            $levelStr = 'ERROR';
            break;
    }
 
    $date = date( 'Y-m-d H:i:s' );
    $msg = sprintf( "[%s] [%s]: %s%s", $date, $levelStr, $msg, PHP_EOL );
 
    file_put_contents( $file, $msg, FILE_APPEND );
}

echo $response;

?>
