<?php
$method = $_SERVER['REQUEST_METHOD'];

header("Content-Type: application/json; charset=UTF-8");

switch ($method) {
    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $data = json_decode(file_get_contents("php://input"), true);

        if (!$data || !is_array($data)) {
            echo json_encode(["error" => "Debe enviar una lista de datos en formato JSON."]);
            http_response_code(400);
            exit;
        }

        $aniosresumen = [];

        foreach ($data as $anio) {
            if (!isset($anio["anio"]) || !isset($anio["ingreso"]) || !isset($anio["gasto"])) {
                echo json_encode(["error" => "Cada objeto debe contener 'anio', 'ingreso' y 'gasto'"]);
                http_response_code(400);
                exit;
            }

            $beneficio = ($anio["ingreso"] > $anio["gasto"]) ? "Sí" : "No";

            $aniosresumen[] = [
                "anio" => $anio["anio"],
                "ingreso" => $anio["ingreso"],
                "gasto" => $anio["gasto"],
                "beneficio" => $beneficio
            ];
        }

        echo json_encode($aniosresumen);

        break;

    default:
    echo json_encode(['error' => 'Metodo no admitido']);
    break;
    }

?>