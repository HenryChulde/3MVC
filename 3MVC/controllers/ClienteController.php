<?php
require_once __DIR__ . '/../models/Cliente.php';

class ClienteController {

    public function index() {
        $cliente = new Cliente();
        $clientes = $cliente->getAll(); 
        require_once __DIR__ . '/../views/cliente.php';
    }

    public function edit($id) {
        $cliente = new Cliente();
        $clienteData = $cliente->get($id);
        require_once __DIR__ . '/../views/cliente_edit.php'; 
    }

    public function update() {
        $id = $_POST['id'];
        $nombres = $_POST['nombres'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $cedula = $_POST['cedula'];
        $correo = $_POST['correo'];

        $cliente = new Cliente();
        $cliente->update($id, $nombres, $direccion, $telefono, $cedula, $correo);
        header('Location: index.php?action=index');
    }

    public function create() {
        $nombres = $_POST['nombres'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $cedula = $_POST['cedula'];
        $correo = $_POST['correo'];

        $cliente = new Cliente();
        $cliente->create($nombres, $direccion, $telefono, $cedula, $correo);
        header('Location: index.php?action=index');
    }

    public function delete($id) {
        $cliente = new Cliente();
        $cliente->delete($id);
        header('Location: index.php?action=index');
    }
}
?>




