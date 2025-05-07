<?php
include("../config/conectar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categoria = $_POST["categoria_id"];
    $proveedor = $_POST["proveedor_id"];
    $nombre = $_POST["nombre_producto"];
    $descripcion = $_POST["descripcion"];
    $cantidad = $_POST["cantidad"];
    $stock = $_POST["stock_minimo"];
    $precio = $_POST["precio_unitario"];
    $vencimiento = $_POST["fecha_vencimiento"];
    $registro = $_POST["fecha_registro"];
    $notas = $_POST["notas"];


    $query = "INSERT INTO inventario (categoria_id, proveedor_id, nombre_producto, descripcion, cantidad, stock_minimo, precio_unitario, fecha_vencimiento, fecha_registro, notas) VALUES ('$categoria','$proveedor', '$nombre' ,'$descripcion', '$cantidad', '$stock', '$precio', '$vencimiento', '$registro', '$notas')";

    if ($enlace->query($query) === TRUE) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
        echo "Error: " . $enlace->error;
    }
}
?>