<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perguntas</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <nav>
        <div class="menu">
            <a href="index.php?page=dispositivos">Dispositivos</a>
            <a href="index.php?page=avaliacao">Avaliação</a>
            <a href="index.php?page=perguntas">Perguntas</a>
            <a href="index.php?page=setores">Setores</a>
            <a href="index.php?page=logout">Sair</a>
        </div>
    </nav>

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