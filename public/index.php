<?php
session_start();

$page = $_GET['page'] ?? 'login';

switch ($page) {

    case '':
        case 'login':
            require __DIR__ . '/../app/controllers/AuthController.php';
            break;

    case 'avaliacao':
            require __DIR__ . '/../app/controllers/AvaliacaoController.php';
            break;

    case 'usuario':
        require __DIR__ . '/../app/controllers/UsuarioController.php';
        break;

    case 'dispositivos':
        require __DIR__ . '/../app/controllers/DispositivoController.php';
        break;

    case 'perguntas':
        require __DIR__ . '/../app/controllers/PerguntaController.php';
        break;

    case 'setores':
        require __DIR__ . '/../app/controllers/SetorController.php';
        break;
    
    default:
        http_response_code(404);
        echo 'Página não encontrada.';
}
?>