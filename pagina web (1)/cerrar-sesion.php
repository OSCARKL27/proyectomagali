<?php
session_start();
session_unset(); // Elimina las variables de sesión
session_destroy(); // Destruye la sesión
header("Location: inicio-sesion.php"); // Redirige al usuario al inicio
exit;
?>