<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Clientes</title>
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
        input[type="text"], input[type="email"] {
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
        <h1>Gestión de Clientes</h1>

        <form action="index.php?action=create" method="post">
            <label for="nombres">Nombres:</label>
            <input type="text" id="nombres" name="nombres" required>
            
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" required>
            
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" required>
            
            <label for="cedula">Cédula:</label>
            <input type="text" id="cedula" name="cedula" required>
            
            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" required>
            
            <button type="submit">Agregar Cliente</button>
        </form>

        <h2>Lista de Clientes</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombres</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Cédula</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
            <?php if (isset($clientes) && !empty($clientes)): ?>
                <?php foreach ($clientes as $cliente): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($cliente->idClientes); ?></td>
                        <td><?php echo htmlspecialchars($cliente->Nombres); ?></td>
                        <td><?php echo htmlspecialchars($cliente->Direccion); ?></td>
                        <td><?php echo htmlspecialchars($cliente->Telefono); ?></td>
                        <td><?php echo htmlspecialchars($cliente->Cedula); ?></td>
                        <td><?php echo htmlspecialchars($cliente->Correo); ?></td>
                        <td class="actions">
                            <a href="index.php?action=edit&id=<?php echo htmlspecialchars($cliente->idClientes); ?>">Editar</a>
                            <a href="index.php?action=delete&id=<?php echo htmlspecialchars($cliente->idClientes); ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="no-products">No hay clientes registrados.</td>
                </tr>
            <?php endif; ?>
        </table>

        <a href="index.php?action=mainMenu" class="back-button">Volver al Menú Principal</a>
    </div>
</body>
</html>

