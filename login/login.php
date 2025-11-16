<?php
session_start();
require_once "../conexion/conexion.php";

$msg_error = "";

// Si el usuario ya está logueado
if (isset($_SESSION["user_id"])) {
    header("Location: ../index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // reCAPTCHA
    $recaptcha_secret = "6LdpSg4sAAAAAHYFkE-KC8ZexReDIm9e6aqscmoT";
    $recaptcha_response = $_POST['g-recaptcha-response'] ?? '';
    $recaptcha = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=$recaptcha_response");
    $recaptcha = json_decode($recaptcha);

    if (!$recaptcha->success) {
        $msg_error = "Por favor verifica que no eres un robot.";
    }
    elseif (!$email || !$password) {
        $msg_error = "Ingrese su correo y contraseña.";
    } 
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg_error = "Correo inválido.";
    } 
    else {
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ? LIMIT 1");
        $stmt->execute([$email]);

        if ($stmt->rowCount() === 0) {
            $msg_error = "El correo no está registrado.";
        } else {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user["estado"] !== "activo") {
                $msg_error = "Tu cuenta está inactiva.";
            }
            elseif (!password_verify($password, $user["user_password"])) {
                $msg_error = "Contraseña incorrecta.";
            } else {
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["username"] = $user["username"];
                $_SESSION["rol"] = $user["rol"];
                header("Location: ../index.php");
                exit;
            }
        }
    }
}
?>