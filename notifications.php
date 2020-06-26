<?php 
require_once './vendor/autoload.php';

MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");
MercadoPago\SDK::setPublicKey('APP_USR-158fff95-0bdf-4149-9abc-c8b0ac7f289f');
MercadoPago\SDK::setAccessToken("APP_USR-8058997674329963-062418-89271e2424bb1955bc05b1d7dd0977a8-592190948"); 

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

$json_event = file_get_contents('php://input', true);
$event = json_decode($json_event);

if ($event->type == 'payment'){
$payment_info = $mp->get('/v1/payments/'.$event->data->id);

   


    if ($payment_info["status"] == 200) {
        print_r($payment_info["response"]);

        echo $id_pago_mp= $payment_info["response"]["id"];
        echo $nombre_cliente   =   $payment_info["response"]["payer"]["first_name"];
        echo $apellido_cliente   =   $payment_info["response"]["payer"]["last_name"];
        echo $email = $payment_info["response"]["payer"]["email"];
        echo $external_reference  = $payment_info["response"]["external_reference"];
        echo $fecha_creacion_pago = $payment_info["response"]["date_created"];
        echo $fecha_exito_pago = $payment_info["response"]["date_approved"];
        echo $estatus_pedido = $payment_info["response"]["status_detail"];
        echo $monto_pago = $payment_info["response"]["transaction_amount"];
        echo $metodo_pago = $payment_info["response"]["payment_type"];
    }

}

?>