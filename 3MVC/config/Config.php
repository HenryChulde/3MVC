<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'base';
    private $username = 'root'; 
    private $password = '1234'; 
    public $pdo;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        $this->pdo = null;
        try {
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }
    }
}
?>

