<?php
// controllers/AlumnoController.php
include_once 'config/Database.php';
include_once 'modelo/Tripulante.php';

class TripulanteController
{
    private $db;
    private $tripulante;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->tripulante = new Tripulante($this->db);
    }

    public function index()
    {
        $stmt = $this->tripulante->read();
        $tripulante = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include 'vista/listar.php';
    }

    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->tripulante->nombre = $_POST['nombre'];
            $this->tripulante->apellidos = $_POST['apellidos'];
            $this->tripulante->fechaNacimiento = $_POST['fechaNacimiento'];
            $this->tripulante->submarino = $_POST['submarino'];
            $this->tripulante->viaja = isset($_POST['viaja']) ? 1 : 0;

            if ($this->tripulante->create()) {
                header("Location: index.php?action=index&message=created");
                exit();
            } else {
                $error = "Error al crear alumno.";
                include 'vista/crear.php'; // Recargar vista con error
            }
        } else {
            include 'vista/crear.php';
        }
    }

    public function edit()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Lógica de actualización (UPDATE)
            $this->tripulante->numTri = $_POST['numTripulante'];
            $this->tripulante->nombre = $_POST['nombre'];
            $this->tripulante->apellidos = $_POST['apellidos'];
            $this->tripulante->fechaNacimiento = $_POST['fechaNacimiento'];
            $this->tripulante->submarino = $_POST['submarino'];
            $this->tripulante->viaja = isset($_POST['viaja']) ? 1 : 0;

            if ($this->tripulante->update()) {
                header("Location: index.php?action=index&message=updated");
                exit();
            } else {
                $error = "Error al actualizar.";
            }
        }

        // Lógica para mostrar el formulario de edición (READ ONE)
        if (isset($_GET['id'])) {
            $this->tripulante->numTri = $_GET['id'];
            $this->tripulante->readOne();
            if ($this->tripulante->nombre) {
                $tripulante_data = (object)['numAlumno' => $this->tripulante->numTri, 'nombre' => $this->tripulante->nombre, 'apellidos' => $this->tripulante->apellidos, 'fechaNacimiento' => $this->tripulante->fechaNacimiento, 'submarino'=>$this->tripulante->submarino,'viaja' => $this->tripulante->viaja];
                include 'vista/editar.php';
            } else {
                echo "Alumno no encontrado.";
            }
        }
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $this->tripulante->numTri = $_GET['id'];
            if ($this->tripulante->delete()) {
                header("Location: index.php?action=index&message=deleted");
                exit();
            } else {
                header("Location: index.php?action=index&message=error_delete");
                exit();
            }
        }
    }
}