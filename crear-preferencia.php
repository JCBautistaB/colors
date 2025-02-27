<?php
require 'vendor/autoload.php';  // Si usas Composer

// Configuración de Mercado Pago
MercadoPago\SDK::setAccessToken('APP_USR-6378641395478188-022700-b612599b847d64f48cce348679d2712b-74762859');

// Crear preferencia de pago
$preference = new MercadoPago\Preference();

// Detalles del producto
$item = new MercadoPago\Item();
$item->title = 'Producto X';
$item->quantity = 1;
$item->unit_price = 100.00;  // Precio del producto

// Agregar el item a la preferencia
$preference->items = array($item);

// Configuración de notificaciones Webhook (opcional)
$preference->notification_url = 'https://tu-sitio.com/webhook.php';  // URL donde recibirás las notificaciones

// Guardar la preferencia
$preference->save();

// Devolver el ID de la preferencia en formato JSON
echo json_encode([
    'id' => $preference->id
]);
?>
