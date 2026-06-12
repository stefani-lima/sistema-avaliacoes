<?php
require_once __DIR__ . '/../../config/auth.php';

require_once __DIR__ . '/../../config/conexao.php';
require_once __DIR__ . '/../models/avaliacao.php';
require_once __DIR__ . '/../models/dispositivo.php';
require_once __DIR__ . '/../models/pergunta.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $idDispositivo = filter_input(INPUT_GET, 'dispositivo', FILTER_VALIDATE_INT);

    if (!$idDispositivo) {
        die('Dispositivo não informado.');
    }

    $dispositivo = buscarDispositivo($pdo, $idDispositivo);

    if (!$dispositivo) {
        die('Dispositivo não encontrado.');
    }

    $_SESSION['id_dispositivo'] = $dispositivo['id_dispositivo'];
    $_SESSION['id_setor'] = $dispositivo['id_setor'];
    $_SESSION['nome_setor'] = $dispositivo['nome_setor'];
    $_SESSION['perguntas'] = buscarPerguntasPorOrdem($pdo);
    // indice controla qual pergunta está sendo exibida. Começa em 0 (primeira).
    $_SESSION['indice'] = 0;
}

// formulário enviado:
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $resposta = filter_input(INPUT_POST, 'resposta', FILTER_VALIDATE_INT);
    $resOpcional = filter_input(INPUT_POST, 'res_opcional', FILTER_DEFAULT);

    // pegamos a pergunta atual pelo índice salvo na sessão
    $perguntaAtual = $_SESSION['perguntas'][$_SESSION['indice']];

    salvarRespostas($pdo, $_SESSION['id_setor'], $perguntaAtual['id_pergunta'], $_SESSION['id_dispositivo'], $resposta, $resOpcional);

    // próxima pergunta
    $_SESSION['indice']++;

    // se o índice passou do total de perguntas, a avaliação acabou
    if ($_SESSION['indice'] >= count($_SESSION['perguntas'])) {
        session_destroy();
        require_once __DIR__ . '/../views/avaliacao/obrigado.php';
        exit;
    }
}

$indice = $_SESSION['indice'];
$perguntaAtual = $_SESSION['perguntas'][$indice];
$textoPergunta = $perguntaAtual['texto_pergunta'];
$idPergunta = $perguntaAtual['id_pergunta'];
$nomeSetor = $_SESSION['nome_setor'];
$idSetor = $_SESSION['id_setor'];
$idDispositivo = $_SESSION['id_dispositivo'];
$totalPerguntas = count($_SESSION['perguntas']);

require_once __DIR__ . '/../views/avaliacao/formulario.php';
