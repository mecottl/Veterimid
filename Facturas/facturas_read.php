<?php
include("../config/conectar.php");

$query = "SELECT f.id_factura, f.fecha, f.total, c.nombre AS cliente_nombre
            FROM facturas f
            JOIN clientes c ON f.id_cliente = c.id_cliente
            order by f.id_factura asc";

$resultado = $enlace->query($query);

$facturas = [];

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $facturas[] = $fila;
    }
}

header('Content-Type: application/json');
echo json_encode($facturas);
?>
