ALTER TABLE doacoes DROP COLUMN dt_doacao;

ALTER TABLE doacoes DROP FOREIGN KEY doacoes_ibfk_1;
ALTER TABLE doacoes DROP FOREIGN KEY doacoes_ibfk_2;

ALTER TABLE doacoes DROP COLUMN id_usuario;
ALTER TABLE doacoes DROP COLUMN id_ong;

ALTER TABLE doacoes ADD COLUMN metodo_pagamento VARCHAR(50) NOT NULL;
ALTER TABLE doacoes ADD COLUMN status VARCHAR(20) NOT NULL DEFAULT 'PENDENTE';
ALTER TABLE doacoes ADD COLUMN descricao TEXT;
ALTER TABLE doacoes ADD COLUMN codigo_transacao VARCHAR(100);
ALTER TABLE doacoes ADD COLUMN bandeira_cartao VARCHAR(20);
ALTER TABLE doacoes ADD COLUMN ultimos_digitos VARCHAR(4);
ALTER TABLE doacoes ADD COLUMN dt_doacao DATETIME DEFAULT CURRENT_TIMESTAMP;

ALTER TABLE doacoes ADD COLUMN id_usuario INT NOT NULL;
ALTER TABLE doacoes ADD COLUMN id_ong INT NOT NULL;

ALTER TABLE doacoes ADD CONSTRAINT fk_doacoes_usuario FOREIGN KEY (id_usuario) REFERENCES usuarios(id);
ALTER TABLE doacoes ADD CONSTRAINT fk_doacoes_ong FOREIGN KEY (id_ong) REFERENCES usuarios(id);

ALTER TABLE doacoes DROP COLUMN comprovante_path;