<?php
$server = "localhost";
$user = "root";
$pass = "";
$tabla = "registro";

$conn = new mysqli($server, $user, $pass, $tabla);

if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}
?>