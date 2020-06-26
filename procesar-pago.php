<?php
	require __DIR__ .  '/vendor/autoload.php';

	$basedir = dirname($_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME']);

	MercadoPago\SDK::setAccessToken('APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398');
	MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");

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
	$payer->address = array(
		"street_name" => " Insurgentes Sur",
		"street_number" => 1602,
		"zip_code" => "03940"
    );
    $payer->identification = array(
        "number"  =>  "22333444",
        "type" => "DNI"
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