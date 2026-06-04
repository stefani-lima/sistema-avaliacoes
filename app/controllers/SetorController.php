<?php 
    require_once __DIR__ . '/../../config/conexao.php';
    require_once __DIR__ . '/../models/setor.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $idSetor = filter_input(INPUT_POST, 'id_setor', FILTER_VALIDATE_INT);
        $nomeSetor = trim($_POST['nome_setor']);

        // editar setor
        editarSetor($pdo, $nomeSetor, $idSetor);

        // listar setores
        if ($idSetor !== false && !empty($nomeSetor)) {
        $setores = listarSetores($pdo);
        }

        header('Location: SetorController.php');
        exit;
    }

    require_once __DIR__ . '/../views/setores/index.php';
?>