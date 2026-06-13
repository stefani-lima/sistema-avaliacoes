<?php 
require_once __DIR__ . '/conexao.php';

function verificarLogin(): void {
    if (empty($_SESSION['id_usuario'])) {
        header ('Location: index.php?page=login');
        exit;
    }
}

?>