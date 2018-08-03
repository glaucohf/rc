<?php
$ch = curl_init();
$name = "GlaucoTeste35";
$phone = "(11)00000-00000";
$email = "glaucofiles+35@gmail.com";
date_default_timezone_set('America/Sao_Paulo');
$date = date('Y-m-d\TH:i:s');
echo "inicio";
curl_setopt($ch, CURLOPT_URL, "https://api.agendor.com.br/v3/people/upsert");
//curl_setopt($ch, CURLOPT_URL, "https://api.agendor.com.br/v1/people");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);

curl_setopt($ch, CURLOPT_POSTFIELDS, "{
  \"name\": \" $name \",
  \"category\": 1268295,
  \"contact\":
  {
    \"email\": \"glaucofiles+36@gmail.com\",
    \"work\": \"(21) 99999-8888\",
    \"mobile\": \"(11) 99999-8888\"
  },
  \"userOwner\":  262497,
}");

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json", "Authorization: Token 8f424ee5-5945-4227-8564-74c38961b2f8"
));

$response = curl_exec($ch);
echo "fim";
//echo $response;
curl_close($ch);
var_dump(json_decode($response, true));
//comentar 2 proximas linhas
//var_dump(json_decode($response, true));
//var_dump($response);
/*
$ch = curl_init();
$obj = json_decode($response);

$client = $obj->{'personId'};

// Criação da tarefa

curl_setopt($ch, CURLOPT_URL, "https://api.agendor.com.br/v1/tasks");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);

curl_setopt($ch, CURLOPT_POSTFIELDS, "{
	 \"person\":  $client,
    \"text\": \"TESTE:Entrar em contato.\",
    \"dueDate\": \" $date \",
    \"assignedUsers\": [262497]
}");

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json", "Authorization: Token 8f424ee5-5945-4227-8564-74c38961b2f8"
));

$response = curl_exec($ch);
curl_close($ch);

var_dump($response);
*/
?>
