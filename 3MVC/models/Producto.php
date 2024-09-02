<?php
require_once __DIR__ . '/../config/Config.php';

class Producto {
    private $pdo;

    public function __construct() {
        $database = new Database();
        $this->pdo = $database->pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->prepare("SELECT * FROM productos");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ); // Devuelve una lista de objetos stdClass
    }
    
    public function get($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM productos WHERE idProductos = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    
    public function update($id, $codigoBarras, $nombreProducto, $grabaIVA) {
        $stmt = $this->pdo->prepare("UPDATE productos SET Codigo_Barras = ?, Nombre_Producto = ?, Graba_IVA = ? WHERE idProductos = ?");
        $stmt->execute([$codigoBarras, $nombreProducto, $grabaIVA, $id]);
    }

    public function create($codigoBarras, $nombreProducto, $grabaIVA) {
        $stmt = $this->pdo->prepare("INSERT INTO productos (Codigo_Barras, Nombre_Producto, Graba_IVA) VALUES (?, ?, ?)");
        $stmt->execute([$codigoBarras, $nombreProducto, $grabaIVA]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM productos WHERE idProductos = ?");
        $stmt->execute([$id]);
    }
}
?>




