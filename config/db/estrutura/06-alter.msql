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

TRUNCATE TABLE doacoes;

ALTER TABLE doacoes ADD CONSTRAINT fk_doacoes_usuario FOREIGN KEY (id_usuario) REFERENCES usuarios(id);
ALTER TABLE doacoes ADD CONSTRAINT fk_doacoes_ong FOREIGN KEY (id_ong) REFERENCES usuarios(id);

INSERT INTO doacoes (valor, anonimo, metodo_pagamento, status, descricao, codigo_transacao, bandeira_cartao, ultimos_digitos, id_usuario, id_ong)
VALUES
(100.00, false, 'Cartão de Crédito', 'APROVADO', 'Doação para campanha ambiental', 'TRX1001', 'Visa', '1234', 1, 1),
(250.50, true, 'Pix', 'APROVADO', 'Doação anônima para educação', 'TRX1002', NULL, NULL, 2, 2),
(75.00, false, 'Cartão de Débito', 'APROVADO', 'Apoio ao projeto de saúde', 'TRX1003', 'Mastercard', '5678', 1, 3),
(150.00, false, 'Boleto', 'PENDENTE', 'Doação em processamento', 'TRX1004', NULL, NULL, 4, 1);