<?php
// Requerir la librería de Mercado Pago
require 'vendor/autoload.php';  // Si usas Composer

// Configuración de Mercado Pago
MercadoPago\SDK::setAccessToken('APP_USR-6378641395478188-022700-b612599b847d64f48cce348679d2712b-74762859');

// Leer los datos de la notificación
$datos = file_get_contents('php://input');
$datos = json_decode($datos);

// Verificar si la notificación es válida
if (isset($datos->data->id)) {
    // Obtener el estado de la transacción
    $payment = MercadoPago\Payment::find_by_id($datos->data->id);

    // Acceder al estado de la transacción
    $status = $payment->status;
    $payment_id = $payment->id;

    // Aquí puedes realizar acciones según el estado del pago
    if ($status == 'approved') {
        // El pago fue aprobado, procesa la orden
        echo "Pago aprobado. ID de transacción: " . $payment_id;
    } else {
        // El pago no fue aprobado, maneja el error
        echo "Pago no aprobado. Estado: " . $status;
    }
} else {
    // Datos no válidos
    echo "Error: datos inválidos";
}
?>
