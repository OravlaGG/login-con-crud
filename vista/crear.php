<!-- views/crear.php -->
<?php
    include "config/establecer-sesion.php";
    if (!isset($_SESSION['idusuario']) || !isset($_SESSION['password'])) {  // si el usuario estuviera ya logeado, lo derivamos al inicio interno
        header("Location: ./vista/login.php");    // nosotros haremos comprobación de token
        exit();
    }
 ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Crear Alumno</title>
</head>

<body>
    <h2>Crear Nuevo Alumno</h2>
    <form method="POST" action="index.php?action=create">
        <label>Nombre: <input type="text" name="nombre" required></label><br>
        <label>Apellidos: <input type="text" name="apellidos" required></label><br>
        <label>Fecha de Nacimiento: <input type="date" name="fechaNacimiento" required></label><br>
        <label>Submarino: <input type="text" name="submarino" required></label><br>
        <label>Viaja: <input type="checkbox" name="viaja" value="1"></label><br>
        <button type="submit">Crear Alumno</button>
    </form>
    <p><a href="index.php?action=index">Volver al listado</a></p>
</body>

</html>