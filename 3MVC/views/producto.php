<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Productos</title>
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
        form {
            margin-bottom: 20px;
            padding: 20px;
            background-color: #e9ecef;
            border-radius: 8px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="text"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .actions a {
            display: inline-block;
            margin-right: 10px;
            padding: 5px 10px;
            font-size: 14px;
            color: #007bff;
            text-decoration: none;
            border: 1px solid #007bff;
            border-radius: 4px;
        }
        .actions a:hover {
            background-color: #007bff;
            color: #fff;
        }
        .no-products {
            text-align: center;
            font-size: 18px;
            color: #666;
        }
        .back-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            text-align: center;
        }
        .back-button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gestión de Productos</h1>

        <form action="index.php?action=createProduct" method="post">
            <label for="codigoBarras">Código de Barras:</label>
            <input type="text" id="codigoBarras" name="codigoBarras" required>
            
            <label for="nombreProducto">Nombre del Producto:</label>
            <input type="text" id="nombreProducto" name="nombreProducto" required>
            
            <label for="grabaIVA">Graba IVA:</label>
            <select id="grabaIVA" name="grabaIVA" required>
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
            
            <button type="submit">Agregar Producto</button>
        </form>

        <h2>Lista de Productos</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Código de Barras</th>
                <th>Nombre del Producto</th>
                <th>Graba IVA</th>
                <th>Acciones</th>
            </tr>
            <?php if (isset($productos) && !empty($productos)): ?>
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($producto->idProductos); ?></td>
                        <td><?php echo htmlspecialchars($producto->Codigo_Barras); ?></td>
                        <td><?php echo htmlspecialchars($producto->Nombre_Producto); ?></td>
                        <td><?php echo htmlspecialchars($producto->Graba_IVA ? 'Sí' : 'No'); ?></td>
                        <td class="actions">
                            <a href="index.php?action=editProduct&id=<?php echo htmlspecialchars($producto->idProductos); ?>">Editar</a>
                            <a href="index.php?action=deleteProduct&id=<?php echo htmlspecialchars($producto->idProductos); ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="no-products">No hay productos registrados.</td>
                </tr>
            <?php endif; ?>
        </table>

        <a href="index.php?action=mainMenu" class="back-button">Volver al Menú Principal</a>
    </div>
</body>
</html>



