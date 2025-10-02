-- 1) Endereços 
INSERT INTO enderecos (logradouro, numero, cep, complemento, bairro, cidade, estado) VALUES
  ('Rua A', 100, '79000000', NULL, 'Centro', 'Campo Grande', 'MS'),
  ('Av. B', 200, '79010000', 'Apto 12', 'Amambaí', 'Dourados', 'MS'),
  ('Rua C', 300, '01010000', NULL, 'Bela Vista', 'São Paulo', 'SP'),
  ('Av. D', 400, '30100000', 'Bloco C', 'Funcionários', 'Belo Horizonte', 'MG');

-- 2) Imagens 
INSERT INTO imagens (nome_enviado, nome_original, caminho) VALUES
  ('1.jpg', '1.jpg', 'https://img.example.com/1.jpg'),
  ('2.jpg', '2.jpg', 'https://img.example.com/2.jpg'),
  ('3.jpg', '3.jpg', 'https://img.example.com/3.jpg'),
  ('4.jpg', '4.jpg', 'https://img.example.com/4.jpg');

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

-- 7) Paginas
INSERT INTO paginas (titulo, subtitulo, descricao, facebook, instagram, twitter, id_imagem, id_ong) VALUES
  ('Quem Somos', 'Conheça nossa história', 'Nossa ONG atua há mais de 10 anos promovendo ações sociais voltadas à educação e cidadania.', NULL, NULL, NULL, 1, 1),
  ('Projetos', 'Nossas principais iniciativas', 'Temos projetos em diversas áreas: educação, cultura e meio ambiente. Participe e ajude a transformar vidas.', NULL, NULL, NULL, 2, 2),
  ('Doe Agora', 'Sua ajuda faz a diferença', 'Com sua contribuição podemos ampliar nosso impacto e alcançar mais famílias em situação de vulnerabilidade.', NULL, NULL, NULL, 3, 3);

-- 8) Patrocinadores
INSERT INTO patrocinadores (nome, dt_validade, rede_social, ativo, id_imagem_icon) VALUES
  ('Patrocínio A','2025-12-31','@patroA', true, 1),
  ('Patrocínio B','2025-09-30','@patroB', true, 2),
  ('Apoio Saúde','2026-03-31','@apoioSaude', false, 3),
  ('Inclusão Coop','2025-11-15','@inclusaoCoop', true, 4);

-- 9) Voluntários 
INSERT INTO voluntarios (dt_associacao, status_validacao, ativo, id_usuario, id_ong) VALUES
  ('2024-01-10', true, true, 1, 1),
  ('2024-02-20', false, true, 3, 2),
  ('2023-08-15', true, true, 1, 3),
  ('2025-03-01', false, false, 2, 4);

-- 10) Doações 
INSERT INTO doacoes (valor, anonimo, dt_doacao, id_usuario, id_ong) VALUES
  (100.00, false, '2025-05-10', 1, 1),
  (250.50, true, '2025-06-15', 2, 2),
  (75.00, false, '2025-07-01', 1, 3),
  (150.00, false, '2025-07-20', 4, 1);

-- 11) Desenvolvedores
INSERT INTO desenvolvedores(nome, link_linkedin, link_github, link_foto) VALUES
  ('Eduardo Serafim', 'https://www.linkedin.com/in/eduardo-serafim-821649', 'https://github.com/eduardoserafiim', '../assets/images/Copyright/togetherteam/serafim.jpg'),
  ('Henrico Queiroz', 'https://www.linkedin.com/in/henrico-queiroz-7250073', 'https://github.com/HenricQ', '../assets/images/Copyright/togetherteam/queiroz.jpg'),
  ('Vitor Galvão', 'https://www.linkedin.com/in/vitor-galv%C3%A3o-29982a', 'https://github.com/vitorgalvao0', '../assets/images/Copyright/togetherteam/galvao.jpg'),
  ('Antônio Victor', 'https://www.linkedin.com/in/antoniov1ctor/', 'https://github.com/AntonioV1ctor', '../assets/images/Copyright/togetherteam/victor.jpg'),
  ('Luan Mendes', 'https://www.linkedin.com/in/luan-m-26b8342bb/', 'https://github.com/LuanMendesMoura', '../assets/images/Copyright/togetherteam/mendes.jpg'),
  ('Gabrielle Faustino', 'https://www.linkedin.com/in/gabrielle-faustino-025aaa', 'https://github.com/GabrielleFaus', '../assets/images/Copyright/togetherteam/faustino.jpg'),
  ('Rogério Vicente', NULL, 'https://github.com/rogeriovc', '../assets/images/Copyright/togetherteam/vicente.jpg'),
  ('Ariel David', 'https://www.linkedin.com/in/ariel-leza-39680455', 'https://github.com/ArielDavid79', '../assets/images/Copyright/togetherteam/david.jpg'),
  ('Rhyan Komm', 'https://www.linkedin.com/in/rhyan-komm-695699245', 'https://github.com/RhyanSKomm', '../assets/images/Copyright/togetherteam/komm.jpg'),
  ('Allan Fernandes', 'https://www.linkedin.com/in/allan-fernandes-6653962', 'https://github.com/All4nFernandes', '../assets/images/Copyright/togetherteam/fernandes.jpg'),
  ('Murilo Dias', 'https://www.linkedin.com/in/murilo-rocha-4953a3333', 'https://github.com/Murilo460', '../assets/images/Copyright/togetherteam/dias.jpg'),
  ('Rodrigo Ramalho', 'https://www.linkedin.com/in/rodrigo-garcia-ramalho-', 'https://github.com/RodrigoRamalho8', '../assets/images/Copyright/togetherteam/ramalho.jpg'),
  ('Vitor Bueno', 'https://www.linkedin.com/in/vitor-bueno-novaga/', 'https://github.com/Vitor-Novaga', '../assets/images/Copyright/togetherteam/bueno.jpg');
