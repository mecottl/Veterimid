<?php
include("../config/conectar.php");



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar que los datos requeridos están presentes y son válidos
    if (
        !empty($_POST['id_inventario']) && is_numeric($_POST['id_inventario']) &&
        !empty($_POST['categoria_id']) &&
        !empty($_POST['nombre_producto']) &&
        !empty($_POST['cantidad']) &&
        !empty($_POST['stock_minimo']) &&
        !empty($_POST['precio_unitario']) &&
        !empty($_POST['fecha_registro']) &&
        !empty($_POST['proveedor_id'])
    ) {

        $fecha_vencimiento = empty($fecha_vencimiento) ? NULL : $fecha_vencimiento;
        $descripcion = empty($descripcion) ? NULL : $descripcion;
        $notas = empty($notas) ? NULL : $notas;

        // Obtener los datos del formulario
        $id = $_POST['id_inventario'];
        $categoria = $_POST['categoria_id'];
        $nombre = $_POST['nombre_producto'];
        $cantidad = $_POST['cantidad'];
        $descripcion = $_POST['descripcion'];
        $stock = $_POST['stock_minimo'];
        $precio = $_POST['precio_unitario'];
        $registro = $_POST['fecha_registro'];
        $vencimiento = $_POST['fecha_vencimiento'];
        $proveedor = $_POST['proveedor_id'];
        $notas = $_POST['notas'];

        // Preparar la consulta de actualización
        $query = $enlace->prepare("UPDATE inventario SET categoria_id = ?, nombre_producto = ?,  cantidad = ?, descripcion = ?, stock_minimo = ?, precio_unitario = ?, fecha_registro = ?, fecha_vencimiento = ?, proveedor_id = ?, notas = ? WHERE id_inventario = ?");
        $query->bind_param("isissdssssi", $categoria, $nombre, $cantidad, $descripcion, $stock, $precio, $registro, $vencimiento, $proveedor, $notas, $id);
        // Ejecutar la consulta
        if ($query->execute()) {
            header("Location: inventario_read.html"); // Redirige a la lista de citas
            exit();
        } else {
            echo "Error al actualizar inventario: " . $query->error;
        }

    } else {
        echo "Datos incompletos.";
    }
}
?>