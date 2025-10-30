ALTER TABLE voluntarios
MODIFY COLUMN status_validacao ENUM('pendente', 'aprovado', 'rejeitado') DEFAULT 'pendente';
