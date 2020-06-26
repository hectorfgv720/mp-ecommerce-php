<?php 

if($json = json_decode(file_get_contents("php://input"), true)) {
    print_r($json);
    $data = $json;
}else {
    print_r($_POST);
    $data = $_POST;
    echo("no jalo");
    }

require_once './vendor/autoload.php';

MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");
MercadoPago\SDK::setPublicKey('APP_USR-158fff95-0bdf-4149-9abc-c8b0ac7f289f');
MercadoPago\SDK::setAccessToken("APP_USR-8058997674329963-062418-89271e2424bb1955bc05b1d7dd0977a8-592190948"); 

$data = json_decode(file_get_contents('php://input'), true);
print_r($data);

?>
<?php
    switch($_POST["type"]) {
        case "payment":
            $data = MercadoPago\Payment::find_by_id($_POST["id"]);
            break;
        case "plan":
            $data = MercadoPago\Plan::find_by_id($_POST["id"]);
            break;
        case "subscription":
            $data = MercadoPago\Subscription::find_by_id($_POST["id"]);
            break;
        case "invoice":
            $data = MercadoPago\Invoice::find_by_id($_POST["id"]);
            break;
    }

    //print_r($data);

    

?>