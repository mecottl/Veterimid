<?php
include("../config/conectar.php");

$query = "SELECT h.id_historial, h.fecha, h.descripcion, h.tratamiento, m.nombre AS mascota 
            FROM historial_medico h
            JOIN mascotas m ON h.id_mascota = m.id_mascota
            order by h.id_historial asc";
$resultado = $enlace->query($query);

$historiales = [];

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $historiales[] = $fila;
    }
}

header('Content-Type: application/json');
echo json_encode($historiales);
?>