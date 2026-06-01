CREATE DATABASE avaliacao;

CREATE TABLE setores (
    id_setor SERIAL PRIMARY KEY,
    nome_setor VARCHAR(255) NOT NULL,
    ativo BOOLEAN NOT NULL DEFAULT TRUE
);

CREATE TABLE dispositivos (
    id_dispositivo SERIAL PRIMARY KEY,
    id_setor INTEGER NOT NULL,
    nome_dispositivo VARCHAR(255) NOT NULL,
    ativo BOOLEAN NOT NULL DEFAULT TRUE,
    FOREIGN KEY (id_setor)
        REFERENCES setores(id_setor)
);

CREATE TABLE perguntas (
    id_pergunta SERIAL PRIMARY KEY,
    texto_pergunta TEXT NOT NULL,
    ordem_pergunta INTEGER NOT NULL DEFAULT 0,
    ativo BOOLEAN NOT NULL DEFAULT TRUE
);

CREATE TABLE usuarios_administrativos (
    id_usuario SERIAL PRIMARY KEY,
    nome_usuario VARCHAR(100) NOT NULL,
    login_usuario VARCHAR(50) UNIQUE NOT NULL,
    senha_usuario VARCHAR(255) NOT NULL
);

CREATE TABLE avaliacoes (
    id_avaliacao serial PRIMARY KEY,
    id_setor INTEGER NOT NULL,
    id_pergunta INTEGER NOT NULL,
    id_dispositivo INTEGER NOT NULL,
    resposta INTEGER NOT NULL
        CHECK (resposta BETWEEN 0 AND 10),
    feedback_textual TEXT,
    data_hora TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (id_setor)
        REFERENCES setores(id_setor),

    FOREIGN KEY (id_pergunta)
        REFERENCES perguntas(id_pergunta),

    FOREIGN KEY (id_dispositivo)
        REFERENCES dispositivos(id_dispositivo)
);

--INSERTS:

-- SETORES
INSERT INTO setores (nome_setor) VALUES
('Recepção'),
('Vendas'),
('Caixa'),
('Estacionamento'),
('Suporte Técnico');

-- DISPOSITIVOS
INSERT INTO dispositivos (id_setor, nome_dispositivo) VALUES
(1, 'Tablet Recepção'),
(2, 'Tablet Vendas'),
(3, 'Tablet Caixa'),
(4, 'Tablet Estacionamento'),
(5, 'Tablet Suporte');

-- PERGUNTAS
INSERT INTO perguntas (texto_pergunta, ordem_pergunta) VALUES
('Como você avalia o atendimento recebido?', 1),
('Como você avalia o tempo de espera?', 2),
('Como você avalia a cordialidade dos funcionários?', 3),
('Como você avalia a organização do ambiente?', 4),
('Como você avalia a qualidade do serviço prestado?', 5);

-- USUÁRIOS ADMINISTRATIVOS
INSERT INTO usuarios_administrativos (
    nome_usuario,
    login_usuario,
    senha_usuario
) VALUES (
    'Administrador',
    'admin',
    'admin123'
);

-- AVALIAÇÕES
INSERT INTO avaliacoes (
    id_setor,
    id_pergunta,
    id_dispositivo,
    resposta,
    feedback_textual
) VALUES
(1, 1, 1, 9, 'Atendimento excelente.'),
(1, 2, 1, 8, NULL),
(1, 3, 1, 10, NULL),
(1, 4, 1, 9, NULL),
(1, 5, 1, 9, 'Muito satisfeito.'),

(2, 1, 2, 7, 'Bom atendimento.'),
(2, 2, 2, 6, NULL),
(2, 3, 2, 8, NULL),
(2, 4, 2, 7, NULL),
(2, 5, 2, 8, 'Equipe prestativa.'),

(3, 1, 3, 10, 'Caixa muito rápido.'),
(3, 2, 3, 10, NULL),
(3, 3, 3, 9, NULL),
(3, 4, 3, 10, NULL),
(3, 5, 3, 10, 'Excelente experiência.'),

(4, 1, 4, 6, 'Difícil encontrar vaga.'),
(4, 2, 4, 5, NULL),
(4, 3, 4, 7, NULL),
(4, 4, 6, NULL),
(4, 5, 6, 'Pode melhorar.'),

(5, 1, 5, 8, 'Problema resolvido rapidamente.'),
(5, 2, 5, 8, NULL),
(5, 3, 5, 9, NULL),
(5, 4, 5, 8, NULL),
(5, 5, 5, 9, 'Ótimo suporte.');
