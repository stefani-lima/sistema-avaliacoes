<?php
require_once __DIR__ . '/../../config/auth.php';
verificarLogin();

require_once __DIR__ . '/../../config/conexao.php';
require_once __DIR__ . '/../models/setor.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
    $idSetor = filter_input(INPUT_POST, 'id_setor', FILTER_VALIDATE_INT);
    $nomeSetor = trim($_POST['nome_setor']);

    if ($idSetor !== false && !empty($nomeSetor)) {

        // editar setor
        editarSetor($pdo, $nomeSetor, $idSetor);
    }
}

$setores = listarSetores($pdo);

    require_once __DIR__ . '/../views/setores/index.php';
?>