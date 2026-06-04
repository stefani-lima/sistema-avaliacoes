<?php 
    require_once __DIR__ . '/../../config/conexao.php';
    require_once __DIR__ . '/../models/dispositivo.php';

    $dispositivo = buscarDispositivo($pdo, $idDispositivo);

    require_once __DIR__ . '/../views/dispositivos/index.php';
?>