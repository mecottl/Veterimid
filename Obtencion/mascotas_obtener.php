<?php
include("../config/conectar.php");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $query = $enlace->prepare("SELECT * FROM mascotas WHERE id_mascota = ?");
    $query->bind_param("i", $id);
    $query->execute();
    $resultado = $query->get_result();
    
    if ($resultado->num_rows > 0) {
        echo json_encode($resultado->fetch_assoc());
    } else {
        echo json_encode(["error" => "mascota no encontrada"]);
    }
} else {
    echo json_encode(["error" => "ID no válido"]);
}
?>
