<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
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
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            color: #007bff;
            text-decoration: none;
            border: 1px solid #007bff;
            border-radius: 4px;
        }
        a:hover {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Producto</h1>

        <form action="index.php?action=updateProduct" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($productoData->idProductos); ?>">

            <label for="codigoBarras">Código de Barras:</label>
            <input type="text" id="codigoBarras" name="codigoBarras" value="<?php echo htmlspecialchars($productoData->Codigo_Barras); ?>" required>

            <label for="nombreProducto">Nombre del Producto:</label>
            <input type="text" id="nombreProducto" name="nombreProducto" value="<?php echo htmlspecialchars($productoData->Nombre_Producto); ?>" required>

            <label for="grabaIVA">Graba IVA:</label>
            <select id="grabaIVA" name="grabaIVA" required>
                <option value="1" <?php echo $productoData->Graba_IVA ? 'selected' : ''; ?>>Sí</option>
                <option value="0" <?php echo !$productoData->Graba_IVA ? 'selected' : ''; ?>>No</option>
            </select>

            <button type="submit">Actualizar Producto</button>
        </form>

        <a href="index.php?action=indexProduct">Volver a la lista de productos</a>
    </div>
</body>
</html>




