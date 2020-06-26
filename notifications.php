<?php

    MercadoPago\SDK::setAccessToken("APP_USR-8058997674329963-062418-89271e2424bb1955bc05b1d7dd0977a8-592190948");

    switch($_GET["type"]) {
        case "payment":
            $response = MercadoPago\Payment.find_by_id($_GET["id"]);
            break;
        case "plan":
            $response = MercadoPago\Plan.find_by_id($_GET["id"]);
            break;
        case "subscription":
            $response = MercadoPago\Subscription.find_by_id($_GET["id"]);
            break;
        case "invoice":
            $response = MercadoPago\Invoice.find_by_id($_GET["id"]);
            break;
    }

    json_encode($response);

?>