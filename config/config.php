<?php 
    function carregarEnv( string $path): void {
        if (!file_exists($path)) {
            throw new RuntimeException(".env não encontrado em: {$path}");
        }
        
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            // ignorar comentários
            if (str_starts_with(trim($line), '#')) {
                continue;
            }
            // separar chave e valor
            if (strpos($line, '=') !== false) {
                [$name, $value] = explode('=', $line, 2);

                $name = trim($name);
                $value = trim($value);

            // definir no ambiente
            $_ENV[$name] = $value;
            $_SERVER[$name] = $value;
            putenv("{$name}={$value}");

            }
        }

    }
?>