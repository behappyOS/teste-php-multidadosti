<?php
require_once 'DataRequest.php';

header('Content-Type: application/json');

if (!isset($_GET['tipo'])) {
    echo json_encode(['error' => 'Tipo não especificado']);
    exit;
}

$tipo = $_GET['tipo'];
$dataRequest = new DataRequest();

switch ($tipo) {
    case 'clientes':
        $dados = $dataRequest->dadosClientes();
        break;
    case 'usuarios':
        $dados = $dataRequest->dadosUsuarios();
        break;
    case 'fornecedores':
        $dados = $dataRequest->dadosFornecedores();
        break;
    default:
        echo json_encode(['error' => 'Tipo inválido']);
        exit;
}

echo json_encode($dados);
