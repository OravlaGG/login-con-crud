<!-- views/editar.php -->
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
      --bg-panel: rgba(10, 25, 35, 0.88);
      --accent: #1fb6ff;
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
      overflow: hidden;
      font-family:'Segoe UI', sans-serif;
    }

    .login-card {
      background: var(--bg-panel);
      border: 1px solid rgba(31, 182, 255, 0.25);
      border-radius: 16px;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.8);
    }

    .login-title {
      font-family: 'SingaSlab', sans-serif;
      letter-spacing: 0.25em;
      color: var(--accent);
      text-transform: uppercase;
    }

    .form-control {
      background: rgba(5, 15, 20, 0.85);
      border: 1px solid rgba(31, 182, 255, 0.25);
      color: var(--text-main);
    }

    .form-control:focus {
      background: rgba(5, 15, 20, 0.95);
      color: var(--text-main);
      border-color: var(--accent);
      box-shadow: 0 0 0 0.15rem rgba(31, 182, 255, 0.35);
    }

    .btn-barotrauma {
      background: linear-gradient(180deg, #27c2ff, #0b6c9c);
      color: #021018;
      font-weight: 700;
      letter-spacing: 0.15em;
      border: none;
    }

    .btn-barotrauma:hover {
        filter: brightness(1.1);
    }

    .btn-barotrauma-vuelta {
      background: linear-gradient(180deg, #f0f000, #515300);
      color: #021018;
      font-weight: 700;
      letter-spacing: 0.15em;
      border: none;
    }

    .btn-barotrauma-vuelta:hover {
      filter: brightness(1.1);
    }

    .status {
      font-size: 0.8rem;
      color: var(--text-dim);
    }

    .status .danger {
      color: var(--danger);
      font-weight: 600;
    }

    .footer {
      font-size: 0.7rem;
      color: #5f7f8c;
      letter-spacing: 0.08em;
    }
  </style>
</head>

<body>
    <h2></h2>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-5">
                <div class="card login-card p-4">
                    <div class="text-center mb-3">
                        <h1 class="login-title h1">Nuevo Tripulante</h1>
                        <div class="text-secondary small"></div>
                    </div>
                    <form method="POST" index.php?action=edit&id=<?php echo $tripulante_data->numTripulante;?>">
                        <div class="mb-3">
                            <input type="hidden" name="numTripulante" value="<?php echo $tripulante_data->numTripulante;?>">
                            <label class="form-label text-secondary small">Nombre: </label>
                            <input type="text" name="nombre" class="form-control" value="<?php echo htmlspecialchars($tripulante_data->nombre); ?>" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label text-secondary small">Apellidos: </label>
                            <input type="text" name="apellidos" class="form-control" value="<?php echo htmlspecialchars($tripulante_data->apellidos); ?>" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label text-secondary small">Fecha de Nacimiento: </label>
                            <input type="date" name="fechaNacimiento" class="form-control" value="<?php echo htmlspecialchars($tripulante_data->fechaNacimiento); ?>" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label text-secondary small">Submarino: </label>
                            <input type="text" name="submarino" class="form-control" value="<?php echo htmlspecialchars($tripulante_data->submarino); ?>" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label text-secondary small">Viaja: </label>
                            <input type="checkbox" name="viaja" <?php echo $tripulante_data->viaja ? 'checked' : ''; ?>>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-barotrauma btn-lg">INTEGRAR TRIPULANTE</button>
                        </div>
                        <div class="mt-4 d-grid">
                            <button onclick="location.href='../index.php?action=index';" type="button" href="index.php?action=index" class="btn btn-barotrauma-vuelta btn-lg">VOLVER A LA LISTA</button>
                        </div>
                    </form>
                    <div class="text-center mt-4 status">
                        Estado del casco: <span class="text-info fw-semibold">INTEGRIDAD ESTABLE</span>
                    </div>
                    <div class="text-center mt-3 footer">
                        Europa Submarine Command Coorporation ©
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>