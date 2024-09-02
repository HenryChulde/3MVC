<?php
$action = isset($_GET['action']) ? $_GET['action'] : 'menu';

switch ($action) {
    case 'index':
        require_once __DIR__ . '/controllers/ClienteController.php';
        $controller = new ClienteController();
        $controller->index();
        break;
    case 'edit':
        require_once __DIR__ . '/controllers/ClienteController.php';
        $controller = new ClienteController();
        $controller->edit($_GET['id']);
        break;
    case 'update':
        require_once __DIR__ . '/controllers/ClienteController.php';
        $controller = new ClienteController();
        $controller->update();
        break;
    case 'create':
        require_once __DIR__ . '/controllers/ClienteController.php';
        $controller = new ClienteController();
        $controller->create();
        break;
    case 'delete':
        require_once __DIR__ . '/controllers/ClienteController.php';
        $controller = new ClienteController();
        $controller->delete($_GET['id']);
        break;
    case 'indexProduct':
        require_once __DIR__ . '/controllers/ProductoController.php';
        $controller = new ProductoController();
        $controller->index();
        break;
    case 'editProduct':
        require_once __DIR__ . '/controllers/ProductoController.php';
        $controller = new ProductoController();
        $controller->edit($_GET['id']);
        break;
    case 'updateProduct':
        require_once __DIR__ . '/controllers/ProductoController.php';
        $controller = new ProductoController();
        $controller->update();
        break;
    case 'createProduct':
        require_once __DIR__ . '/controllers/ProductoController.php';
        $controller = new ProductoController();
        $controller->create();
        break;
    case 'deleteProduct':
        require_once __DIR__ . '/controllers/ProductoController.php';
        $controller = new ProductoController();
        $controller->delete($_GET['id']);
        break;
    case 'menu':
    default:
        // Muestra el menú principal
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Bienvenida a la Tienda</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    margin: 0;
                    padding: 0;
                }
                .container {
                    width: 80%;
                    margin: 0 auto;
                    padding: 20px;
                    background-color: #fff;
                    border-radius: 8px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }
                h1 {
                    text-align: center;
                    color: #333;
                }
                nav {
                    display: flex;
                    justify-content: center;
                    margin-top: 20px;
                }
                nav ul {
                    list-style: none;
                    padding: 0;
                    margin: 0;
                    display: flex;
                    gap: 20px;
                }
                nav ul li {
                    display: inline;
                }
                nav ul li a {
                    text-decoration: none;
                    color: #007bff;
                    font-size: 18px;
                    font-weight: bold;
                    padding: 10px 20px;
                    border-radius: 4px;
                    background-color: #e9ecef;
                    transition: background-color 0.3s, color 0.3s;
                }
                nav ul li a:hover {
                    background-color: #007bff;
                    color: #fff;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <h1>Bienvenida a la Tienda</h1>

                <nav>
                    <ul>
                        <li><a href="index.php?action=index">Ver Clientes</a></li>
                        <li><a href="index.php?action=indexProduct">Ver Productos</a></li>
                    </ul>
                </nav>
            </div>
        </body>
        </html>
        <?php
        break;
}
?>

