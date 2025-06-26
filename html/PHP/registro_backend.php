<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);

    $verificar = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $verificar->bind_param("s", $email);
    $verificar->execute();
    $resultado = $verificar->get_result();

    if ($resultado->num_rows > 0) {
        header("Location: http://localhost/PAGINAA-WEB/html/html/registro.php?error=correo");
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, contraseña) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $email, $contraseña);

    if ($stmt->execute()) {
        header("Location: http://localhost/PAGINAA-WEB/html/html/login.php?registro=ok");

    } else {
        header("Location: http://localhost/PAGINAA-WEB/html/html/registro.php?error=registro"); 
    }

    $conn->close();
    exit();
}
?>
