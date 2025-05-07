<?php
include("../config/conectar.php");

$query = "SELECT m.id_mascota, m.nombre, m.edad, m.raza, m.peso, m.especie, c.id_cliente, c.nombre AS cliente_nombre
FROM mascotas m
JOIN clientes c ON m.id_cliente = c.id_cliente
order by id_mascota";

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