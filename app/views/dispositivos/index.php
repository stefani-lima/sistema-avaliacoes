<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispositivos</title>
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
    
    <div class="card dispositivos">

        <header>
            <h1>Lista de dispositivos</h1>
        </header>

        <main>

            <?php if (!empty($listarDispositivos)): ?>
        
            <table>

                <tr>
                    <th>ID</th>
                    <th>Nome do Dispositivo</th>
                    <th>Ativo</th>
                </tr>
                <?php foreach ($listarDispositivos as $dispositivo): ?>
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

    </div>
    

</body>
</html>