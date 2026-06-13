<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispositivos</title>
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
        <h1>Lista de dispositivos</h1>
    </header>

    <main>
        <?php if (!empty($listaDispositivos)): ?>
    
        <table>
            <tr>
                <th>Escolha o seu dispositivo</th>
            </tr>
            <?php foreach ($listaDispositivos as $dispositivo): ?>
                <tr>
                    <td>
                        <a href="index.php?page=avaliacao&dispositivo=<?= $dispositivo['id_dispositivo'] ?>">
                            Avaliar — <?= htmlspecialchars($dispositivo['nome_dispositivo']) ?>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>

        <?php else: ?>

            <p>Sem resultados encontrados.</p>

        <?php endif; ?>


    </main>

</body>
</html>