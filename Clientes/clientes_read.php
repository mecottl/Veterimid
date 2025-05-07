<?php
include("../config/conectar.php");

$query = "SELECT * FROM clientes order by id_cliente asc";
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