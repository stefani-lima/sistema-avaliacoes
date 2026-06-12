<?php 
require_once __DIR__ . '/../../config/auth.php';
verificarLogin();

    
require_once __DIR__ . '/../../config/conexao.php';
require_once __DIR__ . '/../models/pergunta.php';

$perguntas = buscarPerguntasPorOrdem($pdo);

require_once __DIR__ . '/../views/perguntas/index.php';
?>