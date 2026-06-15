<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form action="?page=usuario" method="post">
        <div class="card criar_conta">
            <h1>Criar uma conta</h1>
            <div class="form_field">
                <input class="form_input" placeholder="Nome completo" type="text" name="nome" id="nome">    
            </div>
            <div class="form_field"> 
                <input class="form_input" placeholder="Usuário" type="text" name="login" id="login">
            </div>
            <div class="form_field">
                <input class="form_input" placeholder="Senha" type="password" name="senha" id="senha">
            </div>
            <input type="submit" id="enviar" value="Criar">
        </div>
    </form>
</body>
</html>