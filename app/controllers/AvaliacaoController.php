<?php 
    require_once __DIR__ . '/../../config/conexao.php';
    require_once __DIR__ . '/../models/avaliacao.php';

    // SOLUÇÃO TEMPORÁRIA!!!
    $idSetor = null;
    $idPergunta = null;
    $idDispositivo = null;
    
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resposta = filter_input(INPUT_POST, 'resposta', FILTER_VALIDATE_INT);
    $resOpcional = filter_input(INPUT_POST, 'res_opcional', FILTER_DEFAULT);
    $idSetor = filter_input(INPUT_POST, 'id_setor', FILTER_VALIDATE_INT);
    $idPergunta = filter_input(INPUT_POST, 'id_pergunta', FILTER_VALIDATE_INT);
    $idDispositivo = filter_input(INPUT_POST, 'id_dispositivo', FILTER_VALIDATE_INT);

    salvarRespostas($pdo, $idSetor, $idPergunta, $idDispositivo, $resposta, $resOpcional);
  }

  require_once __DIR__ . '/../views/avaliacao/formulario.php';
?>