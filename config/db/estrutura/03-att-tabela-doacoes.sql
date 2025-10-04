DROP TABLE doacoes;

CREATE TABLE doacoes (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    valor DECIMAL(10,2) NOT NULL,
    anonimo BOOLEAN NOT NULL DEFAULT FALSE,
    metodo_pagamento VARCHAR(50) NOT NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'PENDENTE',
    descricao TEXT,
    codigo_transacao VARCHAR(100),
    bandeira_cartao VARCHAR(20),
    ultimos_digitos VARCHAR(4),
    dt_doacao DATETIME DEFAULT CURRENT_TIMESTAMP,
    id_usuario INT NOT NULL,
    id_ong INT NOT NULL,
    comprovante_path VARCHAR(255),

    CONSTRAINT fk_doacoes_usuario FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    CONSTRAINT fk_doacoes_ong FOREIGN KEY (id_ong) REFERENCES usuarios(id)
);