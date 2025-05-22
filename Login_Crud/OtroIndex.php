<?php include 'conection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>OtroIndex</title>
</head>
<link rel="icon" href="https://github.com/Alan-Casadiegos/Login-y-Crud-en-php/blob/main/faviconreal.png?raw=true" type="image/png">
<body>
    <form method="post" id="todo">
        <h1 id="titulo" class="text">Registro de usuarios</h1>
    <p><input type="text" name="nombre" placeholder="Ingrese su nombre" required id="name"class="input"></p>
    <p><input type="text" name="apellido" placeholder="Ingrese su apellido" required id="apellido" class="input"></p>
    <p><input type="email" name="correo" placeholder="Ingrese su correo"required id="email" class="input"></p>
    <p><input type="text" name="usuario" placeholder="ingrese su usuario" required id="usuer" class="input"></p>
    <p><input type="password" name="contra" minlength="8" pattern="(?=.*\d).{8,}" placeholder="ingrese su contraseña" required id="contrañ" class="input"></p>
    <p id="texto1" class="text">Requisitos de contraseña:</p>
    <p id="texto2" class="text">-Minimo 8 caracteres</p>
    <p id="texto3" class="text">-Al menos un numero</p>
     <p><button type="submit" id="boton2" class="boton">Registrarse</button></p>
    </form>
</body>
</html>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["correo"];
        $contraseña = $_POST["contra"];
        $user = $_POST["usuario"];
    
    $stmt = $conn->prepare("INSERT INTO tablon (nombre, apellido, correo, contraseña, usuario ) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nombre, $apellido, $email, $contraseña, $user);
    $stmt->execute();
    $stmt->close();
}
echo "<table id='tabla'>";
echo "<tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Correo</th>
        <th>Usuario</th>
        <th>Contraseña</th>
        <th>Acciones</th>
      </tr>";
$result = $conn->query("SELECT * FROM tablon");
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['nombre'] . "</td>";
    echo "<td>" . $row['apellido'] . "</td>";
    echo "<td>" . $row['correo'] . "</td>";
    echo "<td>" . $row['usuario'] . "</td>";
    echo "<td>" . $row['contraseña'] . "</td>";
    echo "<td>
            <a href='edicion.php?id=" . $row['id'] . "'><button id='edit' class='botoncito'>Editar</button></a>
            <a href='borrador.php?id=" . $row['id'] . "'><button id='borrar' class='botoncito'>Eliminar</button></a>
          </td>";
    echo "</tr>";
}    
echo "</table>";
?>

    