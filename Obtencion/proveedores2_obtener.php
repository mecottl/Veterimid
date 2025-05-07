<?php
include("../config/conectar.php");

$query = "SELECT id_proveedor, nombre FROM proveedores";
$resultado = $enlace->query($query);

$proveedores = [];

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $proveedores[] = $fila;
    }
}

header('Content-Type: application/json');
echo json_encode($proveedores);
?>
