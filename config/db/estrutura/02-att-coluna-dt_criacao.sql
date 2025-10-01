-- Tabela: usuarios
ALTER TABLE usuarios
MODIFY dt_criacao DATE NOT NULL DEFAULT (CURDATE());

-- Tabela: patrocinadores
ALTER TABLE patrocinadores
MODIFY dt_criacao DATE NOT NULL DEFAULT (CURDATE());