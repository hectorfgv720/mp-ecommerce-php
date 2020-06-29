<?php 
header('Content-Type: application/json');

$json = json_decode(file_get_contents('php://input'), true);
$json_encode = json_encode($json);

echo $json_encode;

?>