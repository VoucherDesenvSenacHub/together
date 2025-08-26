-- 1) Endereços 
INSERT INTO enderecos (logradouro, numero, cep, complemento, bairro, cidade, estado) VALUES
  ('Rua A', 100, '79000000', NULL, 'Centro', 'Campo Grande', 'MS'),
  ('Av. B', 200, '79010000', 'Apto 12', 'Amambaí', 'Dourados', 'MS'),
  ('Rua C', 300, '01010000', NULL, 'Bela Vista', 'São Paulo', 'SP'),
  ('Av. D', 400, '30100000', 'Bloco C', 'Funcionários', 'Belo Horizonte', 'MG');

-- 2) Imagens 
INSERT INTO imagens (link) VALUES
  ('https://img.example.com/1.jpg'),
  ('https://img.example.com/2.jpg'),
  ('https://img.example.com/3.jpg'),
  ('https://img.example.com/4.jpg');

-- 3) Usuários 
INSERT INTO usuarios (nome, cpf, dt_nascimento, telefone, email, senha, ativo, id_endereco, id_imagem_de_perfil, tipo_perfil) VALUES
('João Silva', '11122233344', '1990-05-10', '(67)99999-0001', 'joao@example.com', '$2y$10$JAanY6sROINWvIGDFI3oHusgGCqdd5GgEO/IwQQXJ8zG0hlkP5rRO', true, 1, 1, 'Usuario'),
('Maria Souza', '22233344455', '1988-09-22', '(67)99999-0002', 'maria@example.com', '$2y$10$JAanY6sROINWvIGDFI3oHusgGCqdd5GgEO/IwQQXJ8zG0hlkP5rRO', true, 2, 2, 'Ong'),
('Carlos Pereira', '33344455566', '1985-12-15', '(11)98888-0003', 'carlos@example.com', '$2y$10$JAanY6sROINWvIGDFI3oHusgGCqdd5GgEO/IwQQXJ8zG0hlkP5rRO', false, 3, 3, 'Administrador'),
('Ana Costa', '44455566677', '1992-03-28', '(31)97777-0004', 'ana@example.com', '$2y$10$JAanY6sROINWvIGDFI3oHusgGCqdd5GgEO/IwQQXJ8zG0hlkP5rRO', true, 4, 4, 'Ong'),
('Paulo Almeida', '55566677788', '1991-07-05', '(21)98888-0005', 'paulo@example.com', '$2y$10$JAanY6sROINWvIGDFI3oHusgGCqdd5GgEO/IwQQXJ8zG0hlkP5rRO', true, 1, 1, 'Usuario'),
('Carla Mendes', '66677788899', '1989-11-12', '(41)97777-0006', 'carla@example.com', '$2y$10$JAanY6sROINWvIGDFI3oHusgGCqdd5GgEO/IwQQXJ8zG0hlkP5rRO', true, 2, 2, 'Usuario'),
('Ricardo Gomes', '77788899900', '1987-04-20', '(51)96666-0007', 'ricardo@example.com', '$2y$10$JAanY6sROINWvIGDFI3oHusgGCqdd5GgEO/IwQQXJ8zG0hlkP5rRO', false, 3, 3, 'Usuario');


-- 4) Categorias de ONGs
INSERT INTO categorias_ongs (nome) VALUES
('Erradicação da pobreza'),
('Fome zero e agricultura sustentável'),
('Saúde e bem-estar'),
('Educação de qualidade'),
('Igualdade de gênero'),
('Água potável e saneamento'),
('Energia limpa e acessível'),
('Trabalho decente e crescimento econômico'),
('Indústria, inovação e infraestrutura'),
('Redução das desigualdades'),
('Cidades e comunidades sustentáveis'),
('Consumo e produção responsáveis'),
('Ação contra a mudança global do clima'),
('Vida na água'),
('Vida terrestre'),
('Paz, justiça e instituições eficazes'),
('Parcerias e meios de implementação');


-- 5) ONGs
INSERT INTO ongs (id_usuario, razao_social, cnpj, telefone, id_endereco, id_categoria) VALUES 
	(1, 'ONG Verde', '98765432000155', '67988887777', 1, 2),
	(2, 'Educar Todos', '98765432000164', '67988887745', 2, 5),
	(3, 'Saúde para Todos', '98765432000173', '67988887799', 3, 6),
	(4, 'Associação Solidária', '98765432000182', '67988887712', 4, 7);

-- 6) Postagens 
INSERT INTO postagens (titulo, dt_postagem, descricao, id_imagem, id_ong) VALUES
  ('Campanha Arborização','2025-06-01','Plantio de árvores',1,1),
  ('Aula Alfabetização','2025-07-15','Voluntários em ação',2,2),
  ('Feira de Saúde','2025-05-20','Atendimento gratuito',3,3),
  ('Projeto Inclusão','2025-04-10','Rodas de conversa',4,4);

-- 7) Patrocinadores
INSERT INTO patrocinadores (nome, dt_validade, rede_social, ativo, id_imagem_icon) VALUES
  ('Patrocínio A','2025-12-31','@patroA', true, 1),
  ('Patrocínio B','2025-09-30','@patroB', true, 2),
  ('Apoio Saúde','2026-03-31','@apoioSaude', false, 3),
  ('Inclusão Coop','2025-11-15','@inclusaoCoop', true, 4);

-- 8) Voluntários 
INSERT INTO voluntarios (dt_associacao, status_validacao, ativo, id_usuario, id_ong) VALUES
  ('2024-01-10', true, true, 1, 1),
  ('2024-02-20', false, true, 3, 2),
  ('2023-08-15', true, true, 1, 3),
  ('2025-03-01', false, false, 2, 4);

-- 9) Doações 
INSERT INTO doacoes (valor, anonimo, dt_doacao, id_usuario, id_ong) VALUES
  (100.00, false, '2025-05-10', 1, 1),
  (250.50, true, '2025-06-15', 2, 2),
  (75.00, false, '2025-07-01', 1, 3),
  (150.00, false, '2025-07-20', 4, 1);
