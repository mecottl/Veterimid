<?php
include("../config/conectar.php");

$query = "SELECT f.id_venta, f.fecha, f.total, c.nombre AS cliente_nombre
            FROM ventas f
            JOIN clientes c ON f.id_cliente = c.id_cliente
            order by f.id_venta asc";

$resultado = $enlace->query($query);

$ventas = [];

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $ventas[] = $fila;
    }
}

header('Content-Type: application/json');
echo json_encode($ventas);
?>
