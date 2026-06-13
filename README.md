# Sistema de Avaliações

Sistema web para coletar avaliações de atendimento por **setor** e **dispositivo** (totens/tablets). Cada dispositivo fica associado a um setor e exibe uma sequência de perguntas (nota de 0 a 10 + comentário opcional). Há também uma área administrativa, protegida por login, para gerenciar setores, dispositivos e perguntas.

---

## 🧰 Tecnologias

- **PHP 8.2** (Apache)
- **PostgreSQL 16**
- **PDO** (`pdo_pgsql`) para acesso ao banco
- **Docker / Docker Compose** para subir o ambiente
- HTML/CSS/JS puro no front-end

---

## 📁 Estrutura do projeto

```
sistema-avaliacoes/
├── app/
│   ├── controllers/        # Lógica de cada rota (entrada da requisição)
│   │   ├── AuthController.php          # Login e logout
│   │   ├── AvaliacaoController.php      # Fluxo público de avaliação
│   │   ├── DashboardController.php      # (ainda não implementado)
│   │   ├── DispositivoController.php
│   │   ├── PerguntaController.php
│   │   ├── SetorController.php
│   │   └── UsuarioController.php        # Criação de conta administrativa
│   ├── models/             # Acesso ao banco (queries)
│   │   ├── avaliacao.php
│   │   ├── dispositivo.php
│   │   ├── login.php
│   │   ├── logout.php
│   │   ├── pergunta.php
│   │   ├── setor.php
│   │   └── usuario.php
│   └── views/              # HTML renderizado
│       ├── auth/           # login, criar conta
│       ├── avaliacao/      # selecionar dispositivo, formulário, obrigado
│       ├── dashboard/
│       ├── dispositivos/
│       ├── perguntas/
│       └── setores/
├── config/
│   ├── auth.php            # verificarLogin() — protege rotas administrativas
│   ├── conexao.php         # cria a conexão PDO (lê variáveis de ambiente / .env)
│   └── config.php          # carregarEnv() — leitor simples de .env
├── database/
│   └── schema.sql          # criação das tabelas + dados de exemplo (seed)
├── docker/
│   └── init-db.sh          # roda o schema na primeira subida do Postgres
├── public/                 # DocumentRoot (raiz pública do Apache)
│   ├── index.php           # front controller / roteador (?page=...)
│   ├── css/style.css
│   └── js/script.js
├── docker-compose.yml
└── Dockerfile
```

### Arquitetura

O projeto segue um padrão **MVC simplificado** com um **front controller**:

1. Toda requisição entra por [public/index.php](public/index.php), que inicia a sessão e lê o parâmetro `?page=`.
2. Com base no `page`, ele inclui o **controller** correspondente.
3. O controller chama funções dos **models** (queries) e, no fim, inclui uma **view** (HTML).

---

## 🗺️ Rotas

Acesso via `index.php?page=<rota>`:

| Rota                          | Controller             | Acesso        | Descrição                                  |
|-------------------------------|------------------------|---------------|--------------------------------------------|
| `login` (padrão)              | `AuthController`       | Público       | Tela de login                              |
| `logout`                      | `AuthController`       | —             | Encerra a sessão                           |
| `usuario`                     | `UsuarioController`    | Público       | Criar conta administrativa                 |
| `avaliacao`                   | `AvaliacaoController`  | Público       | Fluxo de avaliação (totem)                 |
| `avaliacao&dispositivo=<id>`  | `AvaliacaoController`  | Público       | Inicia a avaliação de um dispositivo       |
| `dispositivos`                | `DispositivoController`| Autenticado   | Lista de dispositivos                      |
| `perguntas`                   | `PerguntaController`   | Autenticado   | Lista de perguntas                         |
| `setores`                     | `SetorController`      | Autenticado   | Lista de setores                           |

As rotas administrativas chamam `verificarLogin()` ([config/auth.php](config/auth.php)), que redireciona para o login se não houver sessão ativa.

---

## 🔄 Fluxo de avaliação

1. O usuário acessa `?page=avaliacao`.
   - **Sem** `&dispositivo=<id>`: é exibida uma **tela de seleção** ([selecionar.php](app/views/avaliacao/selecionar.php)) com os dispositivos ativos.
   - **Com** `&dispositivo=<id>`: o dispositivo é validado, o setor é resolvido e as perguntas são carregadas na sessão.
2. As perguntas são exibidas **uma de cada vez**, controladas por um índice em `$_SESSION['indice']`.
3. Cada resposta (nota 0–10 + comentário opcional) é salva na tabela `avaliacoes`.
4. Ao terminar todas as perguntas, a sessão é destruída e é exibida a tela de agradecimento ([obrigado.php](app/views/avaliacao/obrigado.php)).

> Em produção, a ideia é que cada totem abra direto a URL com seu próprio `&dispositivo=<id>`.

---

## 🗄️ Banco de dados

Definido em [database/schema.sql](database/schema.sql). Tabelas principais:

- **setores** — `id_setor`, `nome_setor`, `ativo`
- **dispositivos** — `id_dispositivo`, `id_setor` (FK), `nome_dispositivo`, `ativo`
- **perguntas** — `id_pergunta`, `texto_pergunta`, `ordem_pergunta`, `ativo`
- **usuarios_administrativos** — `id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario` (hash bcrypt)
- **avaliacoes** — `id_avaliacao`, `id_setor`, `id_pergunta`, `id_dispositivo`, `resposta` (0–10), `feedback_textual`, `data_hora`

O `schema.sql` já inclui **dados de exemplo** (5 setores, 5 dispositivos, 5 perguntas, 1 usuário admin e avaliações de teste).

---

## 🚀 Como rodar (Docker)

Pré-requisitos: **Docker** e **Docker Compose**.

```bash
# Na raiz do projeto
docker compose up -d --build
```

Isso sobe dois serviços:

| Serviço | Porta (host) | Descrição                          |
|---------|--------------|------------------------------------|
| `web`   | **8080**     | Aplicação PHP/Apache               |
| `db`    | **5433**     | PostgreSQL 16 (5432 dentro da rede)|

Na **primeira** subida, o [docker/init-db.sh](docker/init-db.sh) executa o `schema.sql` automaticamente (cria tabelas + seed).

Acesse: **http://localhost:8080**

> O código (`app/`, `config/`, `public/`) é montado como volume — alterações nos arquivos refletem **sem rebuild**.

### Parar / resetar

```bash
docker compose down          # para os containers
docker compose down -v       # para e APAGA o banco (volume pgdata) — recria o seed na próxima subida
```

---

## 🔑 Acesso administrativo (seed)

Usuário padrão criado pelo `schema.sql`:

- **Login:** `admin`
- **Senha:** definida no seed do [schema.sql](database/schema.sql) (hash bcrypt)

As senhas são armazenadas com `password_hash()` (bcrypt) e verificadas com `password_verify()`.

---

## ⚙️ Configuração de ambiente

A conexão ([config/conexao.php](config/conexao.php)) lê as credenciais de variáveis de ambiente:

| Variável  | Padrão      |
|-----------|-------------|
| `DB_HOST` | `db`        |
| `DB_PORT` | `5432`      |
| `DB_NAME` | `avaliacao` |
| `DB_USER` | `postgres`  |
| `DB_PASS` | `postgres`  |

No Docker essas variáveis chegam pelo `docker-compose.yml`. Para rodar **fora do Docker**, crie um arquivo `.env` na raiz (ele é carregado automaticamente por `carregarEnv()`):

```env
DB_HOST=localhost
DB_PORT=5433
DB_NAME=avaliacao
DB_USER=postgres
DB_PASS=postgres
```

> `.env` e `config/conexao.php` estão no `.gitignore` (configurações sensíveis).

---

## 📌 Status / pendências

- [ ] **Dashboard** ([DashboardController.php](app/controllers/DashboardController.php)) ainda não implementado.
- [ ] Telas de **cadastro/edição** de setores, dispositivos e perguntas (hoje há listagem).
- [ ] Relatórios/visualização das avaliações coletadas.
