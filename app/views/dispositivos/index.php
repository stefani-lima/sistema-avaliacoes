<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispositivos</title>
</head>
<body>
    <header>
        <h1>Lista de dispositivos</h1>
    </header>

    <main>
        <?php if (!empty($dispositivos)): ?>
    
        <table>
            <tr>
                <th>ID</th>
                <th>Pergunta</th>
                <th>Ativo</th>
            </tr>
            <?php foreach ($dispositivos as $dispositivo): ?>
                <tr>
                    <td><?= htmlspecialchars($dispositivo['id_dispositivo']) ?></td>
                    <td><?= htmlspecialchars($dispositivo['nome_dispositivo']) ?></td>
                    <td><?= htmlspecialchars($dispositivo['ativo'] ? 'Sim' : 'Não') ?></td>
                </tr>
            <?php endforeach; ?>

        </table>

        <?php else: ?>

            <p>Sem resultados encontrados.</p>

        <?php endif; ?>


    </main>

</body>
</html>