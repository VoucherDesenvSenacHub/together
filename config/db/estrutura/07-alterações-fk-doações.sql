ALTER TABLE doacoes DROP FOREIGN KEY fk_doacoes_ong;

ALTER TABLE doacoes ADD CONSTRAINT fk_doacoes_ong FOREIGN KEY (id_ong) REFERENCES ongs(id);