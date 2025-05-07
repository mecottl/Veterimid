<?php
include("../config/conectar.php");

$query = "SELECT 
    i.id_inventario,
    i.nombre_producto,
    i.descripcion,
    i.cantidad,
    i.stock_minimo,
    i.precio_unitario,
    i.fecha_vencimiento,
    i.fecha_registro,
    i.notas,
    c.nombre AS categoria_nombre,
    p.nombre AS proveedor_nombre
FROM 
    inventario i
JOIN 
    categoria c ON i.categoria_id = c.id_categoria
JOIN 
    proveedores p ON i.proveedor_id = p.id_proveedor
ORDER BY i.id_inventario ASC ";

$resultado = $enlace->query($query);

$inventario = [];

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $inventario[] = $fila;
    }
}

header('Content-Type: application/json');
echo json_encode($inventario);
?>