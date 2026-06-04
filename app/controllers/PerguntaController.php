<?php 
    require_once __DIR__ . '/../../config/conexao.php';
    require_once __DIR__ . '/../models/pergunta.php';

    $perguntas = buscarPerguntas($pdo);

    require_once __DIR__ . '/../views/perguntas/index.php';
?>