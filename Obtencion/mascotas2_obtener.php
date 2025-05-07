<?php
include("../config/conectar.php");

$query = "SELECT id_mascota, nombre FROM mascotas";
$resultado = $enlace->query($query);

$mascotas = [];

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $mascotas[] = $fila;
    }
}

header('Content-Type: application/json');
echo json_encode($mascotas);
?>
