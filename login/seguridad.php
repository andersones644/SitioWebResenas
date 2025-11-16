<?php
require_once "../conexion/conexion.php";

if (!isset($_SESSION["user_id"]) || !isset($_SESSION["session_token"])) {
    header("Location: login.php");
    exit;
}

$stmt = $conn->prepare("SELECT session_token FROM usuarios WHERE id = ? LIMIT 1");
$stmt->execute([$_SESSION["user_id"]]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Si el token no coincide → se inició sesión en otro navegador
if ($user["session_token"] !== $_SESSION["session_token"]) {
    session_destroy();
    echo "⚠ Tu sesión fue cerrada porque iniciaste sesión en otro dispositivo.";
    exit;
}
?>
