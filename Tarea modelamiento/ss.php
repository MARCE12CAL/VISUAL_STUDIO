<?php

// Simulación de entrada de datos desde un formulario POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Procesamiento de los datos recibidos
    if (validarUsuario($usuario, $contrasena)) {
        $mensaje = "Inicio de sesión exitoso para $usuario";
        guardarRegistro($usuario, 'inicio_sesion');
    } else {
        $mensaje = "Error: Usuario o contraseña incorrectos";
    }
}

// Función para validar usuario (ejemplo básico)
function validarUsuario($usuario, $contrasena) {
    // Aquí iría la lógica real de validación, como consultar una base de datos
    // Aquí simulamos que el usuario "admin" con contraseña "password" siempre es válido
    return ($usuario == 'admin' && $contrasena == 'password');
}

// Función para guardar registro de actividades
function guardarRegistro($usuario, $accion) {
    // Aquí iría el código para insertar un registro en una tabla de auditoría o log
    // Ejemplo básico de salida de datos
    echo "Registro guardado: Usuario $usuario realizó la acción $accion";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejemplo de Diagrama de Flujo de Datos en PHP</title>
</head>
<body>
    <h2>Formulario de Inicio de Sesión</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>
        
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required><br><br>
        
        <button type="submit">Iniciar Sesión</button>
    </form>

    <?php if (isset($mensaje)) : ?>
        <p><?php echo $mensaje; ?></p>
    <?php endif; ?>
</body>
</html>
