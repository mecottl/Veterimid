<?php
include("../config/conectar.php");

$query = "SELECT c.id_cita, c.estado, c.fecha, c.hora, m.nombre AS mascota, u.nombre AS veterinario , c.motivo 
            FROM citas c
            JOIN mascotas m ON c.id_mascota = m.id_mascota
            JOIN usuarios u ON c.id_veterinario = u.id_usuario
            order by c.id_cita asc";

$resultado = $enlace->query($query);

$citas = [];

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $citas[] = $fila;
    }
}

header('Content-Type: application/json');
echo json_encode($citas);
?>