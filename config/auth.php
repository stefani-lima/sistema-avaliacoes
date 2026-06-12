<?php 
require_once __DIR__ . '/conexao.php';

function verificarLogin(): void {
    if (empty($_SESSION['id_usuario'])) {
        header ('Location: /Projeto%20-%20Avaliações%20(PHP)/public/index.php?page=login');
        exit;
    }
}

?>