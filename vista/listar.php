<!-- views/listar.php -->
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
    <title>Barotrauma • Tripulación</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        @font-face {
        font-family: 'SingaSlab';
        src: url('fonts/Singa Slab OL Regular.ttf') format('truetype');
        font-weight: normal;
        font-style: normal;
        }

        :root {
            --bg-dark: #050b10;
            --bg-panel: rgba(10, 25, 35, 0.92);
            --accent: #1fb6ff;
            --danger: #ff4c4c;
            --success: #3ddc97;
            --text-main: #cfe9f2;
            --text-dim: #7fa6b5;
        }

        body {
            min-height: 100vh;
            background:
                radial-gradient(circle at 50% 120%, #0b3a4a 0%, transparent 60%),
                linear-gradient(to bottom, #020608, #050b10 40%, #020608);
            color: var(--text-main);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        body::after {
            content: "";
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='120' height='120'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='120' height='120' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
            pointer-events: none;
            mix-blend-mode: overlay;
        }

        .panel {
            width: 100%;
            max-width: 1100px;
            background: var(--bg-panel);
            border: 1px solid rgba(31, 182, 255, 0.25);
            border-radius: 18px;
            padding: 32px;
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.85);
        }

        .panel-title {
            font-family: 'SingaSlab', sans-serif;
            letter-spacing: 0.35em;
            color: var(--accent);
            text-align: center;
        }

        .panel-subtitle {
            text-align: center;
            font-size: 0.85rem;
            color: var(--text-dim);
            margin-bottom: 30px;
        }

        .table {
            color: var(--text-main);
        }

        .table thead th {
            font-size: 0.8rem;
            letter-spacing: 0.12em;
            color: var(--text-dim);
            border-bottom: 1px solid rgba(31, 182, 255, 0.25);
        }

        .table td {
            border-color: rgba(31, 182, 255, 0.12);
        }

        .table-dark {
            --bs-table-bg: rgba(5, 15, 20, 0.85);
            --bs-table-striped-bg: rgba(10, 30, 40, 0.6);
            --bs-table-hover-bg: rgba(31, 182, 255, 0.12);
            --bs-table-border-color: rgba(31, 182, 255, 0.2);
            color: var(--text-main);
        }

        .table-dark thead th {
            background-color: rgba(15, 45, 60, 0.9);
            color: var(--accent);
            letter-spacing: 0.14em;
            font-size: 0.75rem;
            border-bottom: 1px solid rgba(31, 182, 255, 0.4);
        }

        .table-dark td {
            vertical-align: middle;
        }

        .table-dark tbody tr:hover {
            box-shadow: inset 0 0 0 9999px rgba(31, 182, 255, 0.08);
        }

        .badge-yes {
            background-color: var(--success);
        }

        .badge-no {
            background-color: var(--danger);
        }

        .btn-barotrauma {
            background: linear-gradient(180deg, #27c2ff, #0b6c9c);
            color: #021018;
            font-weight: 700;
            letter-spacing: 0.14em;
            border: none;
        }

        .btn-barotrauma:hover{
            filter: brightness(1.1);
        }

        .btn-barotrauma-vuelta {
            background: linear-gradient(180deg, #f00000, #530000);
            color: #021018;
            font-weight: 700;
            letter-spacing: 0.15em;
            border: none;
        }

        .btn-barotrauma-vuelta:hover{
            filter: brightness(1.1);
        }

        .alert-success {
            background-color: rgba(61, 220, 151, 0.15);
            border-color: rgba(61, 220, 151, 0.4);
            color: var(--success);
        }

        a {
            color: var(--accent);
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .actions a {
            margin: 0 4px;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>

<div class="panel">

    <!-- HEADER -->
    <div class="mb-4">
        <h1 class="panel-title">TRIPULACIÓN</h1>
        <div class="panel-subtitle">
            Control de personal • Profundidad estable • Casco operativo
        </div>
    </div>

    <!-- MENSAJES -->
    <?php if (isset($_GET['message'])): ?>
        <div class="alert alert-success text-center mb-4">
            <?php
            if ($_GET['message'] === 'created') echo 'Tripulante creado correctamente.';
            if ($_GET['message'] === 'updated') echo 'Tripulante actualizado correctamente.';
            if ($_GET['message'] === 'deleted') echo 'Tripulante eliminado correctamente.';
            ?>
        </div>
    <?php endif; ?>

    <!-- ACCIONES SUPERIORES -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="index.php?action=create" class="btn btn-barotrauma">
            + NUEVO TRIPULANTE
        </a>

        <a href="index.php?action=logout" class="btn btn-barotrauma-vuelta">
            CERRAR SESIÓN
        </a>
    </div>

    <!-- TABLA -->
    <div class="table-responsive">
        <table class="table table-dark table-striped table-hover align-middle">

            <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Nacimiento</th>
                <th>Submarino</th>
                <th>Viaja</th>
                <th class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($tripulante as $tripulante): ?>
                <tr>
                    <td><?= $tripulante['numTripulante'] ?></td>
                    <td><?= htmlspecialchars($tripulante['nombre']) ?></td>
                    <td><?= htmlspecialchars($tripulante['apellidos']) ?></td>
                    <td><?= htmlspecialchars($tripulante['fechaNacimiento']) ?></td>
                    <td><?= htmlspecialchars($tripulante['submarino']) ?></td>
                    <td>
                        <?php if ($tripulante['viaja']): ?>
                            <span class="badge badge-yes">Sí</span>
                        <?php else: ?>
                            <span class="badge badge-no">No</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-center actions">
                        <a href="index.php?action=edit&id=<?= $tripulante['numTripulante'] ?>">Editar</a>
                        |
                        <a href="index.php?action=delete&id=<?= $tripulante['numTripulante'] ?>"
                           onclick="return confirm('¿Confirmar eliminación?');">
                            Eliminar
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

</body>
</html>