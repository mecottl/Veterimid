<?php
include("../config/conectar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente = $_POST["cliente"];
    $fecha = $_POST["fecha"];
    $total = $_POST["total"];
    
    $query = "INSERT INTO ventas (id_cliente,fecha,total) VALUES ('$cliente', '$fecha', '$total')";
    
    if ($enlace->query($query) === TRUE) {
        header("Location: ventas_read.html");
    } else {
        echo "Error: " . $enlace->error;
    }
}
?>
