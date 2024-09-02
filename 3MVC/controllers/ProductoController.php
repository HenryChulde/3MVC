<?php
require_once __DIR__ . '/../models/Producto.php';

class ProductoController {

    public function index() {
        $producto = new Producto();
        $productos = $producto->getAll(); 
        require_once __DIR__ . '/../views/producto.php'; 
    }

    public function edit($id) {
        $producto = new Producto();
        $productoData = $producto->get($id); 
        require_once __DIR__ . '/../views/producto_edit.php'; 
    }

    public function update() {
        $id = $_POST['id'];
        $codigoBarras = $_POST['codigoBarras'];
        $nombreProducto = $_POST['nombreProducto'];
        $grabaIVA = $_POST['grabaIVA'];

        $producto = new Producto();
        $producto->update($id, $codigoBarras, $nombreProducto, $grabaIVA);
        header('Location: index.php?action=indexProduct'); 
    }

    public function create() {
        $codigoBarras = $_POST['codigoBarras'];
        $nombreProducto = $_POST['nombreProducto'];
        $grabaIVA = $_POST['grabaIVA'];

        $producto = new Producto();
        $producto->create($codigoBarras, $nombreProducto, $grabaIVA);
        header('Location: index.php?action=indexProduct');
    }

    public function delete($id) {
        $producto = new Producto();
        $producto->delete($id);
        header('Location: index.php?action=indexProduct');
    }
}
?>





