<?php
require_once __DIR__ . '/../../config/auth.php';
verificarLogin();
 
require_once __DIR__ . '/../../config/conexao.php';
require_once __DIR__ . '/../models/usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nomeUsuario = $_POST['nome'];
    $loginUsuario = $_POST['login'];
    $senhaUsuario = $_POST['senha'];

    if (!empty($_POST['nome']) && !empty($_POST['login']) && !empty($_POST['senha'])) {

        $usuarioModel = new UsuarioModel($pdo);
        $usuario = $usuarioModel->criarConta($nomeUsuario, $loginUsuario, $senhaUsuario);

        if ($usuario) {

            header('Location: /Projeto%20-%20Avaliações%20(PHP)/public/index.php?page=login');
            exit;
        } else {
            die('Erro ao criar nova conta.');
        }
    }
}

require_once __DIR__ . '/../views/auth/usuario.php';
?>