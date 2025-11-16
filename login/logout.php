<?php
session_start();
require_once "../conexion/conexion.php";

if (isset($_SESSION["user_id"])) {
    $stmt = $conn->prepare("UPDATE usuarios SET session_token = NULL WHERE id = ?");
    $stmt->execute([$_SESSION["user_id"]]);
}

session_destroy();
header("Location: formulario_login.php");
exit;
?>