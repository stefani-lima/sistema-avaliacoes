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
                 setor: ...
            </div>
            <form action="" method="post">
            <div class="pergunta">
                <h1>
                     Em uma escala de 0 a 10...
                </h1>
                <h2>
                    pergunta
                </h2>
            </div>
        </div>
    </header>

    <main>
        <div class="resposta">
            <!-- loop respostas de 0 a 10 -->
            <?php for ($i = 0; $i <= 10; $i++): ?>

                <input
                    type="radio"
                    name="resposta"
                    id="nota<?= $i ?>"
                    value="<?= $i ?>"
                >

            <label for="nota<?= $i ?>">
                <?= $i ?>
            </label>

            <?php endfor; ?>
        </div>

        <div class="res_opcional">
            <p>Em poucas palavras, descreva o que motivou sua nota sobre a indicação <i>(opcional)</i></p>
            <input type="text" name="res_opcional" id="res_opcional">
        </div>

        <input type="hidden" name="id_setor" value="<?= $idSetor ?>">
        <input type="hidden" name="id_pergunta" value="<?= $idPergunta ?>">
        <input type="hidden" name="id_dispositivo" value="<?= $idDispositivo ?>">
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