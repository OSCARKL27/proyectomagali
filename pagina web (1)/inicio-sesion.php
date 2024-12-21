<?php
include 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    $sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($contraseña, $row['contraseña'])) {
            // Inicia sesión al autenticar correctamente
            $_SESSION['usuario'] = $row['nombre']; 
            header("Location: index.php"); // Redirige al inicio
            exit;
        } else {
            echo "<script>alert('Contraseña incorrecta.');</script>";
        }
    } else {
        echo "<script>alert('Correo no registrado.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
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

.login-container {
    background-color: white;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    width: 380px;
    text-align: center;
    position: absolute;
    top: 25%;
    right: 40%;
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
input[type="password"] {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-bottom: 20px;
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


    </style>
</head>
<body>
    
    <div class="login-container">
    <h1>Inicio de Sesión</h1>
        <form method="POST">
            <input type="email" name="correo" placeholder="Correo electrónico" required>
            <input type="password" name="contraseña" placeholder="Contraseña" required>

            <button type="submit">Acceso</button>
        </form>
        <div class="extra-links">
            <a href="register.php">¿No tienes una cuenta?</a>

            <a href="index.php">Volver al inicio</a>
        </div>
    </div>
</body>
</html>