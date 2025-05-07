<?php
include("../config/conectar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar que los datos requeridos están presentes y son válidos
    if (!empty($_POST['id_venta']) && is_numeric($_POST['id_venta']) &&
        !empty($_POST['cliente']) &&
        !empty($_POST['fecha']) && 
        !empty($_POST['total'])) { 

        // Obtener los datos del formulario
        $id = $_POST['id_venta'];
        $cliente = $_POST['cliente'];
        $fecha = $_POST['fecha'];
        $total = $_POST['total'];
        

        // Preparar la consulta de actualización
        $query = $enlace->prepare("UPDATE ventas SET  id_cliente = ?, fecha = ?,  total = ? WHERE id_venta = ?");
        $query->bind_param("isdi", $cliente, $fecha, $total, $id);

        // Ejecutar la consulta
        if ($query->execute()) {
            header("Location: ventas_read.html"); // Redirige a la lista de ventas
            exit();
        } else {
            echo "Error al actualizar venta: " . $query->error;
        }

    } else {
        echo "Datos incompletos.";
    }
}
?>
