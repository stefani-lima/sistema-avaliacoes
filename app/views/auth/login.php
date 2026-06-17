<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="card login">
        <form action="?page=login" method="post">
            <strong>Bem vindo(a)</strong>

            <h2>Login</h2>

            <input type="hidden" name="id_usuario">
            <div class="form_field">
                <input type="text" placeholder="Login" name="login" id="login">
            </div>

            <div class="form_field">
                <input type="password" placeholder="Senha" name="senha" id="senha"><br>
            </div>

            <input type="submit" value="Entrar" id="enviar">

        </form>
        
        <a href="?page=usuario" id="criar">Crie sua conta</a>
    </div>

</body>
</html>