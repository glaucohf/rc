<?php

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$interest = $_POST['interest'];
$url = $_SERVER['HTTP_REFERER'];
$formNumber = $_POST['formNumber'];
$observation = sprintf ( "Formulário: %s \n Origem do Lead: \n %s", $formNumber, $url);
$sendWhatsappOption = $_POST['whatsapp_updates'];
$whatsappUrl = 'Location: http://c3717f9.contato.site/7A779';

$defaultConsulting = 262497;
if ($interest == ""){
	$name = $_POST['llfield3519'];
	$phone = $_POST['llfield3521'];
	$email = $_POST['llfield3520'];
	$interest = $_POST['llfield9096']; // Lead from Rio Coaching (dinamic form )
}

switch ($interest) {
case "Kids":
case "Kids - contato": //from icij
	$mailUrl = 'http://kidscoaching.com.br/distribuidor/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/104792';
	$thanksUrl = 'Location: https://kidscoaching.com.br/mensagem-enviada';
	$id = '104792';
    $pid = '3319563';
	$leadOrigins = 1030422;
	$products = "[223809]";
	$prefixfileName = 'tabela2-';
	$dinamicForm = false;
	break;
case "KCP":
	$mailUrl = 'http://kidscoaching.com.br/distribuidor/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/195293';
	$thanksUrl = 'Location: https://kidscoaching.com.br/presencial/mensagem-enviada';
	$id = '195293';
    $pid = '7058771';
	$leadOrigins = 1030466;
	$products = "[318550]";
	$prefixfileName = 'tabela2-';
	$dinamicForm = false;
	break;
case "KCP-RJ":
	$mailUrl = 'http://kidscoaching.com.br/distribuidor/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/195293';
	$thanksUrl = 'Location: https://kidscoaching.com.br/presencial-rj/mensagem-enviada';
	$id = '195293';
    $pid = '7483817';
	$leadOrigins = 1030466;
	$products = "[325440]";
	$prefixfileName = 'tabela2-';
	$dinamicForm = false;
	break;
case "KCP-SP":
	$mailUrl = 'http://kidscoaching.com.br/distribuidor/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/195293';
	$thanksUrl = 'Location: https://kidscoaching.com.br/presencial-sp/mensagem-enviada';
	$id = '195293';
    $pid = '7483818';
	$leadOrigins = 1030466;
	$products = "[325441]";
	$prefixfileName = 'tabela2-';
	$dinamicForm = false;
	break;
case "KCP-BH":
	$mailUrl = 'http://kidscoaching.com.br/distribuidor/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/195293';
	$thanksUrl = 'Location: https://kidscoaching.com.br/presencial-bh/mensagem-enviada';
	$id = '195293';
    $pid = '7483816';
	$leadOrigins = 1030466;
	$products = "[325442]";
	$prefixfileName = 'tabela2-';
	$dinamicForm = false;
	break;
case "KCP-Belem":
	$mailUrl = 'http://kidscoaching.com.br/distribuidor/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/195293';
	$thanksUrl = 'Location: https://kidscoaching.com.br/presencial-belem/mensagem-enviada';
	$id = '195293';
    $pid = '7483821';
	$leadOrigins = 1030466;
	$products = "[325443]";
	$prefixfileName = 'tabela2-';
	$dinamicForm = false;
	break;
case "KCP-PT":
	$mailUrl = 'http://kidscoaching.com.br/distribuidor/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/195293';
	$thanksUrl = 'Location: https://kidscoaching.com.br/presencial-belem/mensagem-enviada';
	$id = '195293';
    $pid = '7934135';
	$leadOrigins = 1030466;
	$products = "[333134]";
	$prefixfileName = 'tabela2-';
	$dinamicForm = false;
	break;
case "Teen":
case "Teen - contato":
	$mailUrl= 'http://kidscoaching.com.br/distribuidor/enviaremailTC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/156625';
	$thanksUrl = 'Location: https://teencoaching.com.br/mensagem-enviada';
	$id = '156625';
    $pid = '5088845';
	$leadOrigins = 1030465;
	$products = "[222988]";
	$prefixfileName = 'tabela2-';
	$dinamicForm = false;
	break;
case "icij":
	$mailUrl = 'http://kidscoaching.com.br/distribuidor/enviarEmailProdutos.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/106619';
	$thanksUrl = 'Location: https://coachinginfantojuvenil.com.br/mensagem-enviada/';
	$id = '106619';
    $pid = '775';
	$leadOrigins = 1057016;
	$products = "[]";
	$prefixfileName = 'tabela2-';
	$dinamicForm = true;
	break;
case "tg":
	$mailUrl = 'http://kidscoaching.com.br/distribuidor/enviarEmailProdutos.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/119021';
	$thanksUrl = 'Location: https://coachinginfantojuvenil.com.br/mensagem-enviada-tg/';
	$id = '119021';
    $pid = '3426935';
	$leadOrigins = 1057016;
	$products = "[208435]";
	$prefixfileName = 'tabela1-';
	$dinamicForm = false;
	break;
case "mb": //TODO Ajustar os valores
	$mailUrl = 'http://kidscoaching.com.br/distribuidor/enviarEmailProdutos.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/119021';
	$thanksUrl = 'Location: https://coachinginfantojuvenil.com.br/mensagem-enviada-tg/';
	$id = '119021';
    $pid = '3426935';
	$leadOrigins = 1057016;
	$products = "[208435]";
	$prefixfileName = 'tabela1-';
	$dinamicForm = false;
	break;
case "+HC":
	$mailUrl = 'http://kidscoaching.com.br/distribuidor/enviarEmailProdutos.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/56451';
	$thanksUrl = 'Location: https://riocoaching.com.br/obrigado/';
	$id = '56451';
    $pid = '2553';
	$leadOrigins = 1030438;
	$products = "[246149]";
	$prefixfileName = 'tabela1-';
	$dinamicForm = true;
	break;
case "BC":
	$mailUrl = 'http://kidscoaching.com.br/distribuidor/enviarEmailProdutos.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/56451';
	$thanksUrl = 'Location: https://riocoaching.com.br/obrigado/';
	$id = '56451';
    $pid = '2553';
	$leadOrigins = 1032227;
	$products = "[255406]";
	$prefixfileName = 'tabela3-';
	$dinamicForm = true;
	break;
case "FSP":
	$mailUrl = 'http://kidscoaching.com.br/distribuidor/enviarEmailProdutos.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/56451';
	$thanksUrl = 'Location: https://riocoaching.com.br/obrigado/';
	$id = '56451';
    $pid = '2553';
	$leadOrigins = 1032226;
	$products = "[318505]";
	$prefixfileName = 'tabela1-';
	$dinamicForm = true;
	break;
case "Passariano": //aulas do passariano
	$mailUrl = 'http://kidscoaching.com.br/distribuidor/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/151488';
	$thanksUrl = 'Location: https://kidscoaching.com.br/oportunidade-curso/';
	$id = '151488';
    $pid = '7814838';
	$leadOrigins = 1077609;
	$products = "[331997]";
	$prefixfileName = 'tabela2-';
	$dinamicForm = false;
	break;
 case "ppl": //ppl1 e 2
	$mailUrl = 'http://kidscoaching.com.br/distribuidor/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/195293';
	$thanksUrl = 'Location: https://kidscoaching.com.br/embreve/';
	$id = '195293';
    $pid = '7716646';
	$leadOrigins = 1077609;
	$products = "[331997]";
	$prefixfileName = 'tabela2-';
	$dinamicForm = false;
	break;
default: //same as kids
	$mailUrl = 'http://kidscoaching.com.br/distribuidor/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/104792';
	$thanksUrl = 'Location: https://kidscoaching.com.br/mensagem-enviada';
	$id = '104792';
    $pid = '3319563';
	$products = "[223809]";
	$prefixfileName = 'tabela2-';
	$dinamicForm = false;
	break;

}
//BEGIN EMAIL
// set post fields to email
$post = [
    'name' => $_POST['name'],
    'message' => $_POST['message'],
	'phone' => $_POST['phone'],
    'email' => $_POST['email'],
	'ads' => $_POST['ads'],
	'utm_data' => $_COOKIE['_ao5_track_mensagem'],
	'ip' => $_SERVER["REMOTE_ADDR"]
];

$ch = curl_init($mailUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

// execute!
$response = curl_exec($ch);

// close the connection, release resources used
curl_close($ch);

// log do envio de email
$msg2log = sprintf(  "Envio de email realizado com sucesso! Nome: %s , email: %s , telefone: %s " , $name, $email, $phone );
logMsg( $msg2log );
logMsg($response);

//BEGIN LEADLOVERS
// set post fields to leadlovers
if ($dinamicForm == true){
	logMsg( DINAMICO );
	// set post fields dinamic form
	$post = [
		'mid' => $id,
		'fid' => $pid,
		'list_id' => $list_id,
		'provider' => 'leadlovers',
		'source' => $_COOKIE['_ao5_track_mensagem'],
		'llfield3519' => $name,
		'llfield3521' => $phone,
		'llfield3520' => $email,
		'llfield9096' => $interest
	];
}
else{
	logMsg( ESTATICO);
	// set post fields static form
	$post = [
		'id' => $id,
		'pid' => $pid,
		'list_id' => $id,
		'provider' => 'leadlovers',
		// 'source' => $_GET['utm_source'],
		//'source' => $_COOKIE['_ao5_track_mensagem'],
		'name' => $name,
		'phone' => $phone,
		'email' => $email
	];
}


$ch = curl_init($leadloversUrl); //mudar
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

// execute!
$responseLL = curl_exec($ch);

// close the connection, release resources used
curl_close($ch);

// log leadlovers
$msg2log = sprintf(  "Envio para leadlovers realizado com sucesso! Nome: %s , email: %s , telefone: %s, URL: %s " , $name, $email, $phone, $leadloversUrl );
logMsg( $msg2log );
logMsg($responseLL);

//BEGIN AGENDOR + FUNCOES
// set post fields to agendor
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

function logMsg( $msg, $level = 'info', $file = 'distribuidor.log' )
{
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

function getActualConsulting($email){

	$curl = curl_init();
	$url= sprintf( "https://api.agendor.com.br/v3/people?email=%s", $email);

	curl_setopt_array($curl, array(
	  CURLOPT_URL => $url,
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
		"Authorization: Token 8f424ee5-5945-4227-8564-74c38961b2f8",
		"Cache-Control: no-cache",
		"Content-Type: application/json",
		"Postman-Token: 15af1f1f-a8a6-97b5-4a56-c78e7170ed8d"
	  ),
	));
	$responseAgConsulting = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  echo "cURL Error #:" . $err;
	  logMsg( $err );
	} else {
	//  echo $responseAg;
	}

	$obj = json_decode($responseAgConsulting, true);
	$actualConsulting = $obj["data"][0]["ownerUser"]["id"];

	// Agendor log - Looking for Consulting
	$msg2log = sprintf(  "Envio para Agendor (Busca de consultor do Lead): Email: %s, URL: %s", $email, $url );
	logMsg( $msg2log );
	logMsg( $actualConsulting );
	logMsg( $responseAgConsulting );

	return $actualConsulting;
}

$leadsPorDia = (int)read($prefixfileName . "leadsPorDia.txt");
$count = (int)read($prefixfileName . "contador.txt");

// Se já tiver um consultor cadastrado, continua com ele
$consulting = getActualConsulting($email);

if ($consulting==""){
	// Se utrapassar o limite diário, lançar para consultor Rio Coaching (262497), senão faz o roundrobin pelos consultores
	$consulting = $defaultConsulting;
	if ($count < $leadsPorDia){
		$value = ++$count;
		$contadorFileName = $prefixfileName . "contador.txt";
		write($value, $contadorFileName);
		$consultingFileName  = $prefixfileName . "consultores.txt";
		$consultings = file( $consultingFileName );
		$numberOfConsulting = (int)count( $consultings );
		$consultingPosition = $count % $numberOfConsulting;
		$consulting = (int)$consultings[$consultingPosition];
	}
}

$curl = curl_init();

$fieldsLead = "{
	\"name\": \"$name\",
	\"ownerUser\":  $consulting,
	\"description\": \"$observation\",
	\"category\": 1268295,
	\"products\": $products,
	\"leadOrigin\": $leadOrigins,
	\"contact\": { \"email\": \"$email\",
	\"whatsapp\": \"$phone\"}}";

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.agendor.com.br/v3/people/upsert",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $fieldsLead,
  CURLOPT_HTTPHEADER => array(
    "Authorization: Token 8f424ee5-5945-4227-8564-74c38961b2f8",
    "Cache-Control: no-cache",
    "Content-Type: application/json",
    "Postman-Token: 15af1f1f-a8a6-97b5-4a56-c78e7170ed8d"
  ),
));
$responseAg = curl_exec($curl);
$err = curl_error($curl);
$obj = json_decode($responseAg);

$client = $obj->{'data'}->{'id'};

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
  logMsg( $err );
} else {
//  echo $responseAg;
}

// Agendor log - Creating Lead
$msg2log = sprintf(  "Envio para Agendor (criação do Lead): Nome: %s, email: %s, telefone: %s, consultor: %s, interesse: %s", $name, $email, $phone, $consulting, $interest );
logMsg( $msg2log );
logMsg( $fieldsLead );
logMsg( $responseAg );

//$today=date('d-m-Y');
//$today=explode("-", $today);
//$tomorrow=date("d-m-Y", mktime(0, 0, 0, $today[1], $today[0] + 1, $today[2]));
//Converter formato de dd-mm-yyyy para yyyy-mm-dd
//$tomorrow_agendor=explode("-", $tomorrow);
//$day=$tomorrow_agendor[0];
//$month=$tomorrow_agendor[1];
//$year=$tomorrow_agendor[2];
//$tomorrow_agendor=$year."-".$month."-".$day."T10:00:00.000Z";

date_default_timezone_set('America/Sao_Paulo');
$date = date('Y-m-d\TH:i:s');

// Task creation
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.agendor.com.br/v1/tasks");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);

$fieldsTask="{
	 \"person\":  $client,
    \"text\": \"Entrar em contato.\",
    \"dueDate\": \" $date \",
    \"assignedUsers\": [$consulting]
}";

curl_setopt($ch, CURLOPT_POSTFIELDS, $fieldsTask);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json", "Authorization: Token 8f424ee5-5945-4227-8564-74c38961b2f8"
));

$responseAgTarefa = curl_exec($ch);

curl_close($ch);

// Agendor log - Creating Task
$msg2log = sprintf(  "Envio para Agendor (criação da tarefa): Nome: %s, email: %s, telefone: %s, consultor: %s, código do cliente: %s ", $name, $email, $phone, $consulting, $client );
logMsg( $msg2log );
logMsg( $fieldsTask );
logMsg( $responseAgTarefa );

if ( $responseAgTarefa ) {
	if ($sendWhatsappOption != ""){
		header($whatsappUrl);
	}
	else{
		header($thanksUrl);
	}
}

?>
