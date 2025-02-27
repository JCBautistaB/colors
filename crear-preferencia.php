<?php
// Incluir el SDK de Mercado Pago (asegúrate de tenerlo instalado)
require 'vendor/autoload.php'; // Si usas Composer, esta línea carga el SDK

// Configura Mercado Pago con tu Access Token
MercadoPago\SDK::setAccessToken('TU_ACCESS_TOKEN');

// Crear la preferencia
$preference = new MercadoPago\Preference();

// Crear un producto
$item = new MercadoPago\Item();
$item->title = 'Producto X';  // Nombre del producto
$item->quantity = 1;          // Cantidad
$item->unit_price = 100.00;   // Precio del producto

// Agregar el producto a la preferencia
$preference->items = array($item);

// URL de redirección después de pago (opcional)
$preference->back_urls = array(
    "success" => "https://tu-sitio.com/pago-exitoso", // Redirige a una página de éxito
    "failure" => "https://tu-sitio.com/pago-fallido", // Redirige a una página de fallo
    "pending" => "https://tu-sitio.com/pago-pendiente" // Redirige a una página si el pago está pendiente
);

// Configurar la notificación del estado del pago (opcional)
$preference->notification_url = 'https://tu-sitio.com/webhook.php'; // URL donde recibirás notificaciones de la transacción

// Guardar la preferencia
$preference->save();

// Devolver el ID de la preferencia como JSON para que el frontend lo use
echo json_encode(['id' => $preference->id]);
?>
