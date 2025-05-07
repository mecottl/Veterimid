<?php
include("../config/conectar.php");

$query = "SELECT * from usuarios order by id_usuario asc";

$resultado = $enlace->query($query);

$plantillas = [];

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $plantillas[] = $fila;
    }
}

header('Content-Type: application/json');
echo json_encode($plantillas);
?>