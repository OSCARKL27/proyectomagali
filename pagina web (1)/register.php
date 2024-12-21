<?php
include 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre, correo, contraseña) VALUES ('$nombre', '$correo', '$contraseña')";

    if ($conn->query($sql) === TRUE) {
        // Inicia sesión automáticamente después del registro
        $_SESSION['usuario'] = $nombre; 
        echo "<script>alert('Registro exitoso.'); window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    background-image: url(imagenes/ensalada\ \(2\).jpg);
    background-size: cover; /* Hace que la imagen cubra toda la pantalla */
    background-repeat: no-repeat;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.register-container {
    background-color: white;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    width: 380px;
    text-align: center;
    position: absolute;
    top: 46%;
    left: 48%;
    transform: translate(-50%, -50%);
}

h1 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
}

form {
    display: flex;
    flex-direction: column;
    align-items: stretch;
}

input[type="email"],
input[type="password"],
input[type="text"] {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-bottom: 20px;
}

input[type="checkbox"] {
    margin-right: 5px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-size: 14px;
    text-align: left;
}

button {
    background-color: #5cb85c;
    color: white;
    border: none;
    padding: 12px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    width: 100%;
}

button:hover {
    background-color: #4cae4c;
}

.extra-links {
    margin-top: 20px;
}

.extra-links a {
    color: #007bff;
    text-decoration: none;
    display: block;
    margin-bottom: 5px;
}

.extra-links a:hover {
    text-decoration: underline;
}

.ok {
    text-align: center;
    width: 100%;
    padding: 12px;
    background-color: aliceblue;
    color: #000;
}

.bad {
    text-align: center;
    width: 100%;
    padding: 12px;
    background-color: #a22;
    color: #fff;
}

    </style>
</head>
<body>
    <div class="register-container">
        <h1>Registro</h1>
        <form method="POST">
            <input type="text" name="nombre" placeholder="Nombre completo" required>
            <input type="email" name="correo" placeholder="Correo electrónico" required>
            <input type="password" name="contraseña" placeholder="Contraseña" required>

            <button type="submit">Registrarse</button>
        </form>
        <div class="extra-links">
            <a href="inicio-sesion.php">¿Ya tienes una cuenta? Inicia sesión aquí</a>
        </div>
    </div>
</body>
</html>
