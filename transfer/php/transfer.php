<?php
$api_key='<api_key>';
$secret_key = '<secret_key>';

$postData = array(
      'amount' => 10000,
      'scheduled_time_utc'=> '2021-04-20 10:10:10',
      'client_reference_id' => '11212919190101',
      'source' => array('account_no' => 'f09dc0d3', 'currency'=> 'TZS'),
      'destination' => array('mobile' => array('wallet_number' => '255701000000', 'wallet_code' => 'ABC12345', 'currency'=> 'TZS'))
);

$Url ='https://apipay.beem.africa/webservices/disbursement/transfer';

// Setup cURL
$ch = curl_init($Url);
error_reporting(E_ALL);
ini_set('display_errors', 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt_array($ch, array(
    CURLOPT_POST => TRUE,
    CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_HTTPHEADER => array(
        'Authorization:Basic ' . base64_encode("$api_key:$secret_key"),
        'Content-Type: application/json'
    ),
    CURLOPT_POSTFIELDS => json_encode($postData)
));

// Send the request
$response = curl_exec($ch);

// Check for errors
if($response === FALSE){
        echo $response;

    die(curl_error($ch));
}
var_dump($response);
?>