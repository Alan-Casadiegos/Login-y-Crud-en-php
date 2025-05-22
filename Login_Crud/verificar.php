<?php
include 'conection.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Verificar Login</title>
</head>
<body>
    
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contra = $_POST["contra"];

    $stmt = $conn->prepare("SELECT nombre, apellido, correo FROM tablon WHERE usuario = ? AND contraseña = ?");
    $stmt->bind_param("ss", $usuario, $contra);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($user = $result->fetch_assoc()) {
        
        $_SESSION['nombre'] = $user['nombre'];
        $_SESSION['apellido'] = $user['apellido'];
        $_SESSION['correo'] = $user['correo'];

        echo "<h2 class='text2'>Bienvenido, " . htmlspecialchars($user['nombre']) . " " . htmlspecialchars($user['apellido']) . "!</h2>";
        echo "<p class='text2'>Correo: " . htmlspecialchars($user['correo']) . "</p>";
        echo "<p><a href='logout.php' ><button id='cerrar'>Cerrar sesión</button></a></p>";
    } else {
        echo "<p class='text2'>Usuario o contraseña incorrectos.</p>";
    }

    $stmt->close();
}
?>
