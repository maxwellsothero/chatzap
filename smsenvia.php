<?php

function bloqueio()
{
    $curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => 'https://mm.otimatel.com.br/api/v2/sms/',
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => '',
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => 'POST',
CURLOPT_POSTFIELDS =>'{
"sendSmsRequest": {
  "to": "5585987655363",
    "message": "ST300CMD;SERIAL;02;Enable1"}}',
CURLOPT_HTTPHEADER => array(
'Content-Type: application/json',
'Authorization: Basic QUFDQjpPVElNQUAxMjM='
),
));


$response = curl_exec($curl);

curl_close($curl);

echo $response;

} 

function desbloqueio()
{
    $curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => 'https://mm.otimatel.com.br/api/v2/sms/',
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => '',
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => 'POST',
CURLOPT_POSTFIELDS =>'{
"sendSmsRequest": {
  "to": "5585987655363",
    "message": "ST300CMD;SERIAL;02;Disable1"}}',
CURLOPT_HTTPHEADER => array(
'Content-Type: application/json',
'Authorization: Basic QUFDQjpPVElNQUAxMjM='
),
));

$response = curl_exec($curl);
curl_close($curl);
echo $response;
}



