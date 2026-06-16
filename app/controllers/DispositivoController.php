<?php 
require_once __DIR__ . '/../../config/auth.php';
verificarLogin();

require_once __DIR__ . '/../../config/conexao.php';
require_once __DIR__ . '/../models/dispositivo.php';

$dispositivos = listarDispositivos($pdo);
    

require_once __DIR__ . '/../views/dispositivos/index.php';
?>