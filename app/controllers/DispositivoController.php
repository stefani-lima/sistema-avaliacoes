<?php 
require_once __DIR__ . '/../../config/auth.php';
verificarLogin();

require_once __DIR__ . '/../../config/conexao.php';
require_once __DIR__ . '/../models/dispositivo.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $idDispositivo = filter_input(INPUT_POST, 'id_dispositivo', FILTER_VALIDATE_INT);
          
    $dispositivo = buscarDispositivo($pdo, $idDispositivo);
}

$listarDispositivos = listarDispositivos($pdo);
    

require_once __DIR__ . '/../views/dispositivos/index.php';
?>