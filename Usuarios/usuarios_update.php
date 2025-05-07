<?php
include("../config/conectar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar que los datos requeridos están presentes y son válidos
    if (
        !empty($_POST['id_usuario']) && is_numeric($_POST['id_usuario']) &&
        !empty($_POST['nombre']) &&
        !empty($_POST['correo']) &&
        !empty($_POST['contraseña']) &&
        !empty($_POST['rol'])
    ) {

        // Obtener los datos del formulario
        $id = $_POST['id_usuario'];
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $contraseña = $_POST['contraseña'];
        $rol = $_POST['rol'];

        // Preparar la consulta de actualización
        $query = $enlace->prepare("UPDATE usuarios SET nombre = ?, correo = ?, contraseña = ?, rol = ? WHERE id_usuario = ?");
        $query->bind_param("ssssi", $nombre, $correo, $contraseña, $rol, $id);

        // Ejecutar la consulta
        if ($query->execute()) {
            header("Location: usuarios_read.html"); // Redirige a la lista de usuarios
            exit();
        } else {
            echo "Error al actualizar usuario: " . $query->error;
        }

    } else {
        echo "Datos incompletos.";
    }
}
?>