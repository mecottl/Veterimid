<?php
include("config/conectar.php"); // Conexión a la base de datos

// Leer los datos enviados desde JavaScript
$datos = json_decode(file_get_contents("php://input"), true);
$correo = $datos['correo'] ?? "";
$contraseña = $datos['contraseña'] ?? "";

// Consulta para verificar el usuario
$query = $enlace->prepare("SELECT id_usuario, rol, contraseña FROM usuarios WHERE correo = ?");
$query->bind_param("s", $correo);
$query->execute();
$result = $query->get_result();
$user = $result->fetch_assoc();

if ($user) {
    if ($user && $contraseña === $user['contraseña']) {
        session_start();
        $_SESSION['id_usuario'] = $user['id_usuario'];
        $_SESSION['rol'] = $user['rol'];

        echo json_encode(["success" => true, "rol" => $user['rol']]);
    } else {
        echo json_encode(["success" => false, "message" => "Contraseña incorrecta."]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Usuario no encontrado."]);
}
?>