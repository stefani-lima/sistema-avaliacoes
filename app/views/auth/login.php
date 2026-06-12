<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="?page=login" method="post">
        <h1>Bem vindo(a)</h1>

        <div class="login">
            <h2>Login</h2>

            <input type="hidden" name="id_usuario">
            Login: <input type="text" name="login" id="login">
            Senha: <input type="password" name="senha" id="senha">
            <input type="submit" value="Entrar">
        </div>
        
        <a href="?page=usuario">Crie sua conta</a>
    </form>
</body>
</html>