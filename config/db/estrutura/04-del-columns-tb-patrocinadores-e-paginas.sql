ALTER TABLE paginas
DROP COLUMN titulo;

ALTER TABLE patrocinadores
DROP COLUMN dt_validade;

ALTER TABLE patrocinadores
MODIFY COLUMN nome varchar(255) unique;