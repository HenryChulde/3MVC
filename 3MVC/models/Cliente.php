<?php
require_once __DIR__ . '/../config/Config.php';

class Cliente {
    private $pdo;

    public function __construct() {
        $database = new Database();
        $this->pdo = $database->pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->prepare("SELECT * FROM clientes");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function get($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM clientes WHERE idClientes = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function update($id, $nombres, $direccion, $telefono, $cedula, $correo) {
        $stmt = $this->pdo->prepare("UPDATE clientes SET Nombres = ?, Direccion = ?, Telefono = ?, Cedula = ?, Correo = ? WHERE idClientes = ?");
        $stmt->execute([$nombres, $direccion, $telefono, $cedula, $correo, $id]);
    }

    public function create($nombres, $direccion, $telefono, $cedula, $correo) {
        $stmt = $this->pdo->prepare("INSERT INTO clientes (Nombres, Direccion, Telefono, Cedula, Correo) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nombres, $direccion, $telefono, $cedula, $correo]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM clientes WHERE idClientes = ?");
        $stmt->execute([$id]);
    }
}
?>


