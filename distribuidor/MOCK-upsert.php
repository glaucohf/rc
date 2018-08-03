<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.agendor.com.br/v3/people/upsert",


  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n  \"name\": \"GlaucoTeste 402\",\n  \"contact\": {\n    \"email\": \"glaucofiles+400@gmail.com\",\n  \"whatsapp\": \"+55(21)987808885\"\n}\n}",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Token 8f424ee5-5945-4227-8564-74c38961b2f8",
    "Cache-Control: no-cache",
    "Content-Type: application/json",
    "Postman-Token: 15af1f1f-a8a6-97b5-4a56-c78e7170ed8d"
  ),
));
$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
?>
