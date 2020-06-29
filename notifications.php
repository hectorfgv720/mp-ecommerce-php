<?php 
header('Content-Type: application/json');

$json = json_decode(file_get_contents('php://input'), true);
$json_encode = json_encode($json);

$handle = curl_init('https://endxzd0xyfi8n.x.pipedream.net/');

curl_setopt($handle, CURLOPT_POST, 1);
curl_setopt($handle, CURLOPT_POSTFIELDS, $json_encode);
curl_setopt($handle, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

$result = curl_exec($handle);

?>