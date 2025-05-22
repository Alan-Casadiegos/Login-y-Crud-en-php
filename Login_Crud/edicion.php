<?php
include 'conection.php';

if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']); 
    $stmt = $conn->prepare("SELECT * FROM tablon WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    if (!$user) {
        die("Error: No se encontró el usuario con ID válido.");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Document</title>
</head>
<body>
    <form method="POST" id="general2">
    <h1 class="text2">Actualizar datos</h1>    
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>">
    <p><input type="text" name="nombre" value="<?php echo htmlspecialchars($user['nombre']); ?>" placeholder="Ingrese su nombre" required class="input"></p>
    <p><input type="text" name="apellido" value="<?php echo htmlspecialchars($user['apellido']); ?>" placeholder="Ingrese su apellido" required class="input"></p>
    <p><input type="email" name="correo" value="<?php echo htmlspecialchars($user['correo']); ?>" placeholder="Ingrese su correo" required class="input"></p>
    <p><input type="text" name="usuario" value="<?php echo htmlspecialchars($user['usuario']); ?>" placeholder="Ingrese su usuario" required class="input"></p>
    <p><input type="password" name="contra" placeholder="Ingrese nueva contraseña (opcional)" minlength="8" pattern="(?=.*\d).{8,}" class="input"></p>
    <button type="submit" class="boton">Actualizar</button>
</form>
</body>
</html>

<?php
} 
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['id'], $_POST['nombre'], $_POST['apellido'], $_POST['correo'], $_POST['usuario'])) {
    $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $apellido = htmlspecialchars(trim($_POST['apellido']));
    $correo = filter_var(trim($_POST['correo']), FILTER_VALIDATE_EMAIL);
    $usuario = htmlspecialchars(trim($_POST['usuario']));
    $contra = isset($_POST['contra']) ? htmlspecialchars(trim($_POST['contra'])) : '';

    var_dump([
        'id' => $id,
        'nombre' => $nombre,
        'apellido' => $apellido,
        'correo' => $correo,
        'usuario' => $usuario,
        'contra' => $contra
    ]);

    if ($id && $nombre && $apellido && $correo && $usuario) {
        if ($contra) {
            $stmt = $conn->prepare("UPDATE tablon SET nombre = ?, apellido = ?, correo = ?, usuario = ?, contraseña = ? WHERE id = ?");
            $stmt->bind_param("sssssi", $nombre, $apellido, $correo, $usuario, $contra, $id);
        } else {
            $stmt = $conn->prepare("UPDATE tablon SET nombre = ?, apellido = ?, correo = ?, usuario = ? WHERE id = ?");
            $stmt->bind_param("ssssi", $nombre, $apellido, $correo, $usuario, $id);
        }
        $stmt->execute();
        $stmt->close();
        header("Location: OtroIndex.php");
        exit();
    } else {
        echo "Error: Algún dato no es válido.";
    }
}
?>