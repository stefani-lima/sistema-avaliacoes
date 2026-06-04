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
</head>
<body>
    <header>
        <div class="header">
            <div class="setor">
                Setor: <?= htmlspecialchars($nomeSetor) ?>
            </div>
            <div class="pergunta">
                <h1>Em uma escala de 0 a 10...</h1>
                <h2><?= htmlspecialchars($textoPergunta) ?></h2>
            </div>
        </div>
    </header>

    <form action="/app/controllers/AvaliacaoController.php" method="post">
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

            <div class="res_opcional">
                <p>Em poucas palavras, descreva o que motivou sua nota <i>(opcional)</i></p>
                <!-- resposta opcional -->
                <input type="text" name="res_opcional" id="res_opcional">
            </div>
        </main>

        <footer>
            <div class="footer">
                <div class="enviar">
                    <input type="submit" value="Enviar">
                </div>
                <h3>Sua avaliação espontânea é anônima, nenhuma informação pessoal é solicitada ou armazenada.</h3>
            </div>
        </footer>
    </form>
</body>
</html>
