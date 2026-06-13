<?php

require_once __DIR__ . '/../../config/auth.php';
// login
require_once __DIR__ . '/../models/login.php';
require_once __DIR__ . '/../models/logout.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $loginUsuario = $_POST['login'];
    $senhaUsuario = $_POST['senha'];

    if (!empty($_POST['login']) && !empty($_POST['senha'])) {
    
        $usuarioModel = new UsuarioModel($pdo);
        $usuario = $usuarioModel->login($loginUsuario, $senhaUsuario);

        if ($usuario) {

            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            $_SESSION['login'] = $usuario['login_usuario'];

            header('Location: index.php?page=dispositivos');
            exit;
            
        } else {
            
            //Usuário não encontrado ou senha incorreta.'
            header('Location: index.php?page=login');
            exit;
        }
    }
    }

if (($_GET['page'] ?? '') === 'logout') {
    logout();
}
    
require_once __DIR__ . '/../views/auth/login.php';
?>