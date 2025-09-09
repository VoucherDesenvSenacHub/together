-- Alterando o nome da coluna por contado conflito das tabela
ALTER TABLE imagens
CHANGE COLUMN nome nome_enviado VARCHAR(255) NOT NULL