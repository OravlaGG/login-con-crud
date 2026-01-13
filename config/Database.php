<?php
// config/Database.php
class Database
{
    private $host = 'localhost';
    private $db_name = 'login-php';
    private $username = 'login-php'; 
    private $password = '1234'; 
    /*Hace falta hacer distintas maneras de acceso a la BD  
    Para poder acceder sin modificar la tabla de logers pero 
    Si la de tripulantes. Lo comentado es el limitado  
    private $db_name = "login-php";
    private $username = "root";
    private $password = "";*/
    public $PDO;

    public function getConnection()
    {
        $this->PDO = null;
        try {
            $this->PDO = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }
        return $this->PDO;
    }
}

