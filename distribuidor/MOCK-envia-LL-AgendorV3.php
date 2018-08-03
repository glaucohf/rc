<?php 
//fake values
$_POST['name'] = "GlaucoTESTE403";
$_POST['message'] = "Nothing";
$_POST['phone'] = "+55(21)98780-8885";
$_POST['email'] = "glaucofiles+403@gmail.com";
$_POST['interest'] = "Teen";

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
	
$defaultConsulting = 262497;
$interest=$_POST['interest'];

//echo "<BR>interest " . $interest;


switch ($interest) {
case "Kids":
	$mailUrl = 'http://riocoaching.com.br/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/151488';
	$thanksUrl = 'Location: https://kidscoaching.com.br/mensagem-enviada';
	$id = '151488';
    $pid = '4785272';
	$prefixfileName = 'tabela2-';
	break;
case "Teen":
	$mailUrl= 'http://riocoaching.com.br/enviaremailTC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/156625';
	$thanksUrl = 'Location: https://teencoaching.com.br/mensagem-enviada';
	$id = '156625';
    $pid = '5088845';
	$prefixfileName = 'tabela2-';
	break;
default: //same as kids
	$mailUrl = 'http://riocoaching.com.br/enviaremailKC.php';
	$leadloversUrl = 'https://leadlovers.com/Pages/Index/151488';
	$thanksUrl = 'Location: https://kidscoaching.com.br/mensagem-enviada';
	$id = '151488';
    $pid = '4785272';
	$prefixfileName = 'tabela2-';
	break;		
}

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

// set post fields to leadlovers

$post = [
    'id' => $id,
    'pid' => $pid,
    'list_id' => $id, 
    'provider' => 'leadlovers',
    // 'source' => $_GET['utm_source'],
    'source' => $_COOKIE['_ao5_track_mensagem'],
    'name' => $name,
    'phone' => $phone,
    'email' => $email
];

$ch = curl_init($leadloversUrl); //mudar
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

// execute!
$responseLL = curl_exec($ch);
//var_dump($responseLL);

// close the connection, release resources used
curl_close($ch);


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

$leadsPorDia = (int)read($prefixfileName . "leadsPorDia.txt");
$count = (int)read($prefixfileName . "contador.txt");

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
	$consulting = $consultings[$consultingPosition];
} 
/*
echo "<BR>leadsPorDia " . $leadsPorDia;
echo "<BR>count " . $count;
echo "<BR>numberOfConsulting " . $numberOfConsulting;
echo "<BR>consultingPosition " . $consultingPosition;
echo "<BR>consulting " . $consulting;
*/

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.agendor.com.br/v3/people/upsert",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n  
	\"name\": \"$name\",\n  
	\"userOwner\":  $consulting,\n
	\"description\": \"$interest\",\n
	\"category\": 1268295,\n
	\"contact\": {\n    \"email\": \"$email\",\n  
	\"whatsapp\": \"$phone\"\n}\n}",
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
} else {
//  echo $responseAg;
}

//Trabalhando com as datas
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

// Criação da tarefa
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.agendor.com.br/v1/tasks");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);

curl_setopt($ch, CURLOPT_POSTFIELDS, "{
	 \"person\":  $client,
    \"text\": \"Entrar em contato.\",
    \"dueDate\": \" $date \",
    \"assignedUsers\": [$consulting]
}");

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json", "Authorization: Token 8f424ee5-5945-4227-8564-74c38961b2f8"
));

$responseAgTarefa = curl_exec($ch);
//var_dump(responseAgTarefa) . "\n";
//echo $responseAgTarefa;
//print_r(json_decode($responseAgTarefa));


curl_close($ch);

 if ( $responseAg ) {
	header($thanksUrl); 
 }

?>
