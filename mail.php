<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $email = htmlspecialchars(trim($_POST['email']));
    $asunto = htmlspecialchars(trim($_POST['tema']));
    $mensaje = htmlspecialchars(trim($_POST['mensaje']));

    if (empty($nombre) || empty($email) || empty($mensaje)) {
        echo "Por favor, completa todos los campos.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "El correo electrónico no es válido.";
        exit;
    }

    $contenido = "Nombre: $nombre\n";
    $contenido .= "Email: $email\n\n";
    $contenido .= "Mensaje:\n$mensaje\n";

    $headers = "From: $nombre <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $destinatario = "lucasdelfino2121@gmail.com";

    if (mail($destinatario, $asunto, $contenido, $headers)) {
        header("Location: index.html?enviado=1");
        exit;
    } else {
        echo "Error al enviar el mensaje.";
    }
} else {
    echo "Acceso no válido.";
}
?>