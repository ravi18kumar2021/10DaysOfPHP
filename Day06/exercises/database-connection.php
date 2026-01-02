<?php
class Database {
    private $host = "localhost";
    private $db = "test";
    private $user = "root";
    private $pass = "";
    private $port = "3307";

    public PDO $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db};port={$this->port}", $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Database connected<br>";
        } catch (PDOException $e) {
            die('Database Error : ' . $e->getMessage());
        }
    }
}
$db = new Database();
?>