<?php
// Incluir el SDK de Mercado Pago
require 'vendor/autoload.php'; // Asegúrate de tener el SDK

// Configura Mercado Pago con tu Access Token
MercadoPago\SDK::setAccessToken('TU_ACCESS_TOKEN');

// Obtener los datos de la notificación
$datos = file_get_contents('php://input');
$data = json_decode($datos, true);

// Validar la notificación con el ID de la preferencia
$preference = MercadoPago\Preference::find_by_id($data['data']['id']);

// Aquí puedes procesar la transacción, verificar el estado del pago, etc.
if ($preference->status == 'approved') {
    // Pago aprobado
    // Realiza acciones como cambiar el estado del pedido en tu base de datos
}

echo "ok"; // Responder con 'ok' a Mercado Pago para confirmar que recibiste la notificación
?>
