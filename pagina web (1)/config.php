<?php
$servername = "localhost";
$username = "root";
$password = ""; // Por defecto, no hay contraseña en WAMP
$dbname = "registro";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
