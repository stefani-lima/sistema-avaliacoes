<?php
/** @var string $nomeSetor */
/** @var string $textoPergunta */
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav>
        <div class="menu">
            <ul>
                <li><a href="index.php?page=dispositivos">Dispositivos</a></li>
                <li><a href="index.php?page=avaliacao">Avaliação</a></li>
                <li><a href="index.php?page=perguntas">Perguntas</a></li>
                <li><a href="index.php?page=setores">Setores</a></li>
                <li><a href="index.php?page=logout">Sair</a></li>
            </ul>
        </div>
    </nav>
    
    <div class="card formulario">

        <header>
            <div class="header">
                <div class="setor">
                    Setor: <?= htmlspecialchars($nomeSetor) ?>
                </div>
                <div class="pergunta">
                    <h2><?= htmlspecialchars($textoPergunta) ?></h2>
                </div>
            </div>
        </header>

        <form action="" method="post">
            <main>
                <div class="resposta">
                    <!-- pode ser de 0 até 10 -->
                    <?php for ($i = 0; $i <= 10; $i++): ?>
                        <input
                            type="radio"
                            name="resposta"
                            id="nota<?= $i ?>"
                            value="<?= $i ?>"
                        >
                        <label for="nota<?= $i ?>"><?= $i ?></label>
                    <?php endfor; ?>
                </div>

                <div class="form_field">
                    <p>Em poucas palavras, descreva o que motivou sua nota <i>(opcional)</i></p>
                    <!-- resposta opcional -->
                    <input type="text" name="res_opcional" id="res_opcional" class="form_input">
                </div>
            </main>

            <footer>
                <div class="footer">
                    <div class="enviar">
                        <input type="submit" id="enviar" value="Enviar">
                    </div>
                    <h3>Sua avaliação espontânea é anônima, nenhuma informação pessoal é solicitada ou armazenada.</h3>
                </div>
            </footer>
        </form>
    </div>
    
</body>
</html>
