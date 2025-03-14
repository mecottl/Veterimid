<?php
include("../config/conectar.php");

$query = "SELECT id_usuario, nombre FROM usuarios WHERE rol = 'Veterinario'";
$resultado = $enlace->query($query);

$veterinarios = [];

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $veterinarios[] = $fila;
    }
}

header('Content-Type: application/json');
echo json_encode($veterinarios);
?>
