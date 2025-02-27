<?php
require __DIR__ . '/vendor/autoload.php'; // Composer autoload

MercadoPago\SDK::setAccessToken('APP_USR-6378641395478188-022700-b612599b847d64f48cce348679d2712b-74762859'); // Reemplaza 'YOUR_ACCESS_TOKEN' con tu access token

// Crear preferencia
$preference = new MercadoPago\Preference();

$item = new MercadoPago\Item();
$item->title = 'Producto de prueba';
$item->quantity = 1;
$item->unit_price = 100; // Precio del producto
$preference->items = array($item);

// Guardar preferencia y obtener ID
$preference->save();
echo json_encode(['id' => $preference->id]);
?>
