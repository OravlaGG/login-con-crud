<!-- views/listar.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listado de Alumnos (MVC)</title>
    <style>                            
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .message {
            color: green;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <h2>Listado de Alumnos</h2>

    <?php if (isset($_GET['message'])): ?>
        <div class="message">
            <?php
            // aquí se mostrarían los diferentes mensajes de confirmación tras la realización
            // de cualquiera de las 3 operaciones restantes: crear, modificar, eliminar
            // ya que volveremos a esta vista
            if ($_GET['message'] == 'created') echo 'Tripulante creado correctamente.';
            if ($_GET['message'] == 'updated') echo 'Tripulante actualizado correctamente.';
            if ($_GET['message'] == 'deleted') echo 'Tripulante eliminado correctamente.';
            ?>
        </div>
    <?php endif; ?>

    <p><a href="index.php?action=create">Añadir Nuevo Tripulante</a></p>

    <table>
        <thead>
            <tr>
                <th>Num Tripulación</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Fecha Nacimiento</th>
                <th>Viaja</th>
                <th>Submarino</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tripulante as $tripulante): ?><!-- alumno es una colección de filas de la tabla -->
                <tr>
                    <td><?php echo $tripulante['numTripulante']; ?></td>
                    <td><?php echo htmlspecialchars($tripulante['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($tripulante['apellidos']); ?></td>
                    <td><?php echo htmlspecialchars($tripulante['fechaNacimiento']); ?></td>
                    <td><?php echo htmlspecialchars($tripulante['submarino']);?></td>
                    <td><?php echo $tripulante['viaja'] ? 'Sí' : 'No'; ?></td>
                    <td>
                        <!-- en la última celda incluimos los botones para ir a borrar o editar una fila -->
                        <a href="index.php?action=edit&id=<?php echo $tripulante['numTripulante']; ?>">Editar</a> |
                        <a href="index.php?action=delete&id=<?php echo $tripulante['numTripulante']; ?>" onclick="return confirm('¿Estás seguro?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p><a href="index.php?action=logout">Cerrar sesión (Volver al login)</a></p>

</body>

</html>