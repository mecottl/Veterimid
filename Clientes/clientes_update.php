<?php
include("../config/conectar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        !empty($_POST['id_cliente']) && is_numeric($_POST['id_cliente']) &&
        !empty($_POST['nombre']) && !empty($_POST['telefono']) && !empty($_POST['correo']) && !empty($_POST['direccion'])
    ) {

        $id = $_POST['id_cliente'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $direccion = $_POST['direccion'];

        $query = $enlace->prepare("UPDATE clientes SET nombre = ?, telefono = ?, correo = ?, direccion = ? WHERE id_cliente = ?");
        $query->bind_param("ssssi", $nombre, $telefono, $correo, $direccion, $id);

        if ($query->execute()) {
            header("Location: clientes_read.html");
            exit();
        } else {
            echo "Error al actualizar cliente: " . $enlace->error;
        }
    } else {
        echo "Datos incompletos.";
    }
}
?>