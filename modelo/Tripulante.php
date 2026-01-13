<?php
// models/Alumno.php
class Tripulante
{
    private $conn;
    private $table_name = "tripulantes";

    public $numTri;
    public $nombre;
    public $apellidos;
    public $fechaNacimiento;
    public $viaja;
    public $submarino;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Método para leer todos los alumnos
    public function read()
    {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY numTripulante ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Método para crear un alumno
    public function create()
    {
        $query = "INSERT INTO " . $this->table_name . " SET nombre=:nombre, apellidos=:apellidos, fechaNacimiento=:fechaNacimiento, viaja=:viaja, submarino=:submarino";
        $stmt = $this->conn->prepare($query);

        // Limpiar y enlazar parámetros
        $this->nombre = $this->nombre;
        $this->apellidos = $this->apellidos;
        // ... validaciones si fueran necesarias

        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":apellidos", $this->apellidos);
        $stmt->bindParam(":fechaNacimiento", $this->fechaNacimiento);
        $stmt->bindParam(":submarino", $this->submarino);
        $stmt->bindParam(":viaja", $this->viaja, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Método para leer un solo alumno (para editar)
    public function readOne()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE numTripulante = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->numTri);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $this->nombre = $row['nombre'];
            $this->apellidos = $row['apellidos'];
            $this->fechaNacimiento = $row['fechaNacimiento'];
            $this->submarino = $row['submarino'];
            $this->viaja = $row['viaja'];
        }
    }

    // Método para actualizar un alumno
    public function update()
    {
        $query = "UPDATE " . $this->table_name . " SET nombre=:nombre, apellidos=:apellidos, fechaNacimiento=:fechaNacimiento, viaja=:viaja, submarino=:submarino WHERE numTripulante=:numTripulante";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':apellidos', $this->apellidos);
        $stmt->bindParam(':fechaNacimiento', $this->fechaNacimiento);
        $stmt->bindParam(':viaja', $this->viaja, PDO::PARAM_INT);
        $stmt->bindParam(':numTripulante', $this->numTri, PDO::PARAM_INT);
        $stmt->bindParam(':submarino', $this->submarino);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Método para eliminar un alumno
    public function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE numTripulante = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->numTri, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
} 