<?php
class Database {
    private $host = 'localhost';
    private $db = 'test';
    private $user = 'root';
    private $pass = '';
    private $port = '3307';
    private $conn;

    public function __construct() {
        $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db};port={$this->port}", $this->user, $this->pass);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function getConnection() {
        return $this->conn;
    }
}
?>