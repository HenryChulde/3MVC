<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
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
        .back-button {
            display: inline-block;
            margin-top: 20px;
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
        <h1>Editar Cliente</h1>

        <form action="index.php?action=update" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($clienteData->idClientes); ?>">
            
            <label for="nombres">Nombres:</label>
            <input type="text" id="nombres" name="nombres" value="<?php echo htmlspecialchars($clienteData->Nombres); ?>" required>
            
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" value="<?php echo htmlspecialchars($clienteData->Direccion); ?>" required>
            
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" value="<?php echo htmlspecialchars($clienteData->Telefono); ?>" required>
            
            <label for="cedula">Cédula:</label>
            <input type="text" id="cedula" name="cedula" value="<?php echo htmlspecialchars($clienteData->Cedula); ?>" required>
            
            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" value="<?php echo htmlspecialchars($clienteData->Correo); ?>" required>
            
            <button type="submit">Actualizar</button>
        </form>

        <a href="index.php?action=index" class="back-button">Volver a la lista de clientes</a>
    </div>
</body>
</html>

