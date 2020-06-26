<?php
	require __DIR__ .  '/vendor/autoload.php';

	$basedir = dirname($_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME']);

	MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");
	MercadoPago\SDK::setPublicKey('APP_USR-158fff95-0bdf-4149-9abc-c8b0ac7f289f');
	MercadoPago\SDK::setAccessToken('APP_USR-8058997674329963-062418-89271e2424bb1955bc05b1d7dd0977a8-592190948');

	$preference = new MercadoPago\Preference();

	$item = new MercadoPago\Item();
	$item->id = "1234";
	$item->title = $_POST['title'];
	$item->description = "Dispositivo móvil de Tienda e-commerce";
	$item->picture_url = $basedir . '/' . str_replace('./', '', $_POST['img']);
	$item->quantity = 1;
    $item->unit_price = floatval($_POST['price']);
	$preference->items = array($item);

	$payer = new MercadoPago\Payer();
	$payer->name = "Lalo";
	$payer->surname = "Landa";
	$payer->email = "test_user_58295862@testuser.com";
	$payer->phone = array(
		"area_code" => "52",
		"number" => "5549737300"
	);

	$payer->identification = array(
        "number"  =>  "22333444",
        "type" => "DNI"
    );

	$payer->address = array(
		"street_name" => "Insurgentes Sur",
		"street_number" => 1602,
		"zip_code" => "03940"
	);	
	
    $preference->payer = $payer;

	$preference->payment_methods = array(
		'excluded_payment_methods' => array(
			array('id' => 'amex'),
		),
		'excluded_payment_types'=> array(
			array('id' => 'atm'),
		),
		'installments' => 6
	);

	$preference->notification_url = "$basedir/notifications.php";

	$preference->back_urls = array(
		'failure' => "$basedir/failure.php",
		'pending' => "$basedir/pending.php",
		'success' => "$basedir/success.php"
	);

	$preference->auto_return = "approved";
	$preference->external_reference = "hectorfgv@gmail.com";

	$preference->save();
?>