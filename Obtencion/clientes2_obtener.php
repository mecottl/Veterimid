<?php
include("../config/conectar.php");

$query = "SELECT id_cliente, nombre FROM clientes";
$resultado = $enlace->query($query);

$clientes = [];

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $clientes[] = $fila;
    }
}

header('Content-Type: application/json');
echo json_encode($clientes);
?>
