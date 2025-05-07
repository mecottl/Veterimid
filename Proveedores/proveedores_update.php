<?php
include("../config/conectar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar que los datos requeridos están presentes y son válidos
    if (
        !empty($_POST['id_proveedor']) && is_numeric($_POST['id_proveedor']) &&
        !empty($_POST['nombre']) &&
        !empty($_POST['contacto']) &&
        !empty($_POST['telefono']) &&
        !empty($_POST['correo']) &&
        !empty($_POST['direccion'])
    ) {

        // Obtener los datos del formulario
        $id = $_POST['id_proveedor'];
        $nombre = $_POST['nombre'];
        $contacto = $_POST['contacto'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $direccion = $_POST['direccion'];

        // Preparar la consulta de actualización
        $query = $enlace->prepare("UPDATE proveedores SET nombre = ?, contacto = ?, telefono = ?, correo = ?, direccion = ? WHERE id_proveedor = ?");
        $query->bind_param("ssissi", $nombre, $contacto, $telefono, $correo, $direccion, $id);

        // Ejecutar la consulta
        if ($query->execute()) {
            header("Location: proveedores_read.html"); // Redirige a la lista de proveedors
            exit();
        } else {
            echo "Error al actualizar proveedor: " . $query->error;
        }

    } else {
        echo "Datos incompletos.";
    }
}
?>