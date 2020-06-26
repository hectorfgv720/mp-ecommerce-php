<?php

require __DIR__ . '/vendor/autoload.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

MercadoPago\SDK::setAccessToken("APP_USR-8058997674329963-062418-89271e2424bb1955bc05b1d7dd0977a8-592190948");

http_response_code(200);

switch($_POST["type"]) {
    case "payment":
        $response = MercadoPago\Payment.find_by_id($_POST["id"]);
        break;
    case "plan":
        $response = MercadoPago\Plan.find_by_id($_POST["id"]);
        break;
    case "subscription":
        $response = MercadoPago\Subscription.find_by_id($_POST["id"]);
        break;
    case "invoice":
        $response = MercadoPago\Invoice.find_by_id($_POST["id"]);
        break;
}

json_encode($response);

?>