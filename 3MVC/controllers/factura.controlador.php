<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    exit(); // Utiliza exit() en lugar de die() para una salida más clara
}

// TODO: controlador de facturas Tienda Cel@g

require_once('../models/factura.model.php');
$factura = new Factura();

// Helper function to send JSON response
function sendResponse($data, $httpCode = 200) {
    http_response_code($httpCode);
    header('Content-Type: application/json');
    echo json_encode($data);
    exit();
}

// Check if operation is set
if (!isset($_GET["op"])) {
    sendResponse(["error" => "Operation not specified."], 400);
}

switch ($_GET["op"]) {
    case 'todos': // Procedimiento para cargar todas las facturas
        $datos = $factura->todos();
        $todas = [];
        while ($row = mysqli_fetch_assoc($datos)) {
            $todas[] = $row;
        }
        sendResponse($todas);
        break;

    case 'uno': // Procedimiento para obtener una factura por ID
        if (!isset($_POST["idFactura"])) {
            sendResponse(["error" => "Factura ID not specified."], 400);
        }
        $idFactura = intval($_POST["idFactura"]);
        $datos = $factura->uno($idFactura);
        $res = mysqli_fetch_assoc($datos);
        sendResponse($res);
        break;

    case 'insertar': // Procedimiento para insertar una nueva factura
        $requiredFields = ["Fecha", "Sub_total", "Sub_total_iva", "Valor_IVA", "Clientes_idClientes"];
        foreach ($requiredFields as $field) {
            if (!isset($_POST[$field])) {
                sendResponse(["error" => "Missing required parameter: $field."], 400);
            }
        }

        $Fecha = $_POST["Fecha"];
        $Sub_total = $_POST["Sub_total"];
        $Sub_total_iva = $_POST["Sub_total_iva"];
        $Valor_IVA = $_POST["Valor_IVA"];
        $Clientes_idClientes = intval($_POST["Clientes_idClientes"]);

        $datos = $factura->insertar($Fecha, $Sub_total, $Sub_total_iva, $Valor_IVA, $Clientes_idClientes);
        sendResponse($datos);
        break;

    case 'actualizar': // Procedimiento para actualizar una factura existente
        $requiredFields = ["idFactura", "Fecha", "Sub_total", "Sub_total_iva", "Valor_IVA", "Clientes_idClientes"];
        foreach ($requiredFields as $field) {
            if (!isset($_POST[$field])) {
                sendResponse(["error" => "Missing required parameter: $field."], 400);
            }
        }

        $idFactura = intval($_POST["idFactura"]);
        $Fecha = $_POST["Fecha"];
        $Sub_total = $_POST["Sub_total"];
        $Sub_total_iva = $_POST["Sub_total_iva"];
        $Valor_IVA = $_POST["Valor_IVA"];
        $Clientes_idClientes = intval($_POST["Clientes_idClientes"]);

        $datos = $factura->actualizar($idFactura, $Fecha, $Sub_total, $Sub_total_iva, $Valor_IVA, $Clientes_idClientes);
        sendResponse($datos);
        break;

    case 'eliminar': // Procedimiento para eliminar una factura
        if (!isset($_POST["idFactura"])) {
            sendResponse(["error" => "Factura ID not specified."], 400);
        }
        $idFactura = intval($_POST["idFactura"]);
        $datos = $factura->eliminar($idFactura);
        sendResponse($datos);
        break;

    default:
        sendResponse(["error" => "Invalid operation."], 400);
        break;
}
