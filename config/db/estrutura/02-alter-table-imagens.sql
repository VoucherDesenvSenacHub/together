
-- ALterando a tabela imagens e alterando os campos
ALTER TABLE imagens
CHANGE COLUMN link caminho VARCHAR(255) NOT NULL,
ADD COLUMN nome VARCHAR(255) NOT NULL,
ADD COLUMN nome_original VARCHAR(255) NOT NULL,
ADD COLUMN data_envio DATETIME DEFAULT CURRENT_TIMESTAMP;