<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perguntas</title>
</head>
<body>
    <header>
        <h1>Lista de perguntas</h1>
    </header>

    <main>
        <?php if (!empty($perguntas)): ?>
    
        <table>
            <tr>
                <th>ID</th>
                <th>Pergunta</th>
                <th>Ativo</th>
            </tr>
            <?php foreach ($perguntas as $pergunta): ?>
                <tr>
                    <td><?= htmlspecialchars($pergunta['id_pergunta']) ?></td>
                    <td><?= htmlspecialchars($pergunta['texto_pergunta']) ?></td>
                    <td><?= htmlspecialchars($pergunta['ativo'] ? 'Sim' : 'Não') ?></td>
                </tr>
            <?php endforeach; ?>

        </table>

        <?php else: ?>

            <p>Sem resultados encontrados.</p>

        <?php endif; ?>


    </main>

</body>
</html>