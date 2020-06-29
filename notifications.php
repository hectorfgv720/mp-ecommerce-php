<?php 
    header('Content-Type: application/json');
    header("refresh: 3;");

    $json = json_decode(file_get_contents('php://input'), true);
    $json_encode = json_encode($json);

    $_COOKIE["json"] = $json_encode;

    if (isset($_COOKIE["json"]) && $_COOKIE != ""){
        echo $_COOKIE["json"];
    }
?>