<?php
$conn = new mysqli('localhost', 'root', '', 'formulariopruebas');

$cliente_nombre = $_POST['cliente_nombre'];
$piezas = $_POST['piezas'] ?? [];


$conn->query("INSERT INTO cotizaciones (cliente_nombre) VALUES ('$cliente_nombre')");
$cotizacion_id = $conn->insert_id;


foreach ($piezas as $id => $cantidad) {
    $id = intval($id);
    $cantidad = intval($cantidad);

    if ($cantidad > 0) {
        
        $res = $conn->query("SELECT stock FROM piezas_pc WHERE id = $id");
        $row = $res->fetch_assoc();

        if ($row && $row['stock'] >= $cantidad) {
           
            $conn->query("INSERT INTO detalle_cotizacion (cotizacion_id, pieza_id, cantidad) VALUES ($cotizacion_id, $id, $cantidad)");

            $conn->query("UPDATE piezas_pc SET stock = stock - $cantidad WHERE id = $id");
        }
    }
}


echo "<script>alert('¡Cotización enviada exitosamente!'); window.location.href='armar.php';</script>";

