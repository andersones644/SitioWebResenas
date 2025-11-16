<?php
session_start();
require_once "../conexion/conexion.php";

$msg_error = "";
$msg_success = "";

// Procesar registro
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST["username"]);
    $nombre = trim($_POST["nombre"]);
    $apellido = trim($_POST["apellido"]);
    $email = trim($_POST["email"]);
    $celular = trim($_POST["celular"]);
    $password = trim($_POST["password"]);

    // reCAPTCHA
    $recaptcha_secret = "6LdpSg4sAAAAAHYFkE-KC8ZexReDIm9e6aqscmoT";
    $recaptcha_response = $_POST['g-recaptcha-response'] ?? '';
    $recaptcha = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=$recaptcha_response");
    $recaptcha = json_decode($recaptcha);

    if (!$recaptcha->success) {
        $msg_error = "Por favor verifica que no eres un robot.";
    }
    elseif (!$username || !$nombre || !$apellido || !$email || !$celular || !$password) {
        $msg_error = "Complete todos los campos.";
    } 
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg_error = "Correo electrónico inválido.";
    }
    elseif (strlen($celular) != 10 || !ctype_digit($celular)) {
        $msg_error = "El celular debe contener 10 números.";
    }
    else {
        $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = ? OR celular = ?");
        $stmt->execute([$email, $celular]);

        if ($stmt->rowCount() > 0) {
            $msg_error = "El correo o celular ya están registrados.";
        } else {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO usuarios(username, nombre, apellido, user_password, email, celular, rol, estado) VALUES (?, ?, ?, ?, ?, ?, 'usuario', 'activo')");
            if ($stmt->execute([$username, $nombre, $apellido, $passwordHash, $email, $celular])) {
                $msg_success = "¡Registro completado exitosamente!";
            } else {
                $msg_error = "Ocurrió un error al registrar.";
            }
        }
    }
}
?>
