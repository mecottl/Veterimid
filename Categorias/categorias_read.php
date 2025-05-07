<?php
include("../config/conectar.php");

$query = "SELECT * from categoria order by id_categoria asc";
$resultado = $enlace->query($query);

$categorias = [];

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $categorias[] = $fila;
    }
}

header('Content-Type: application/json');
echo json_encode($categorias);
?>