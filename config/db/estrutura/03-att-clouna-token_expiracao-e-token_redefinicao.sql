ALTER TABLE usuarios
ADD COLUMN token_redefinicao VARCHAR(64) NULL AFTER senha,
ADD COLUMN token_expira DATETIME NULL AFTER token_redefinicao;
