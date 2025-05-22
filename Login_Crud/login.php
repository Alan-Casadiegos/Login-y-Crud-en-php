<?php include 'conection.php'; session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Login</title>
</head>
<link rel="icon" href="https://github.com/Alan-Casadiegos/Login-y-Crud-en-php/blob/main/faviconreal.png?raw=true" type="image/png">
<body>
    
    <form method="post" action="verificar.php" id="general">
        <img src="https://github.com/Alan-Casadiegos/Login-y-Crud-en-php/blob/main/Logologin.png?raw=true" alt="" id="logo">
    <p><input type="text" name="usuario" placeholder="Ingrese su usuario" required id="user" class="input"></p>
    <p><input type="password" name="contra" placeholder="Ingrese su contraseña" required id="contra" class="input"></p>
    <p><button type="submit" id="boton1" class="boton">Iniciar sesión</button></p>
</form>

</body>
</html>
