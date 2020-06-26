<?php 
$request = file_get_contents('php://input');
$input = json_decode($request);

file_put_contents('output.txt', var_export($input, TRUE)); 
file_put_contents('output.txt', $request);
?>