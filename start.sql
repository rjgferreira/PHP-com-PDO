DROP DATABASE pdo;
CREATE DATABASE IF NOT EXISTS pdo DEFAULT CHARACTER SET = 'utf8' DEFAULT COLLATE = 'utf8_unicode_ci';
USE pdo;
CREATE TABLE alunos(
  id INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255),
  nota INT,
  PRIMARY KEY (id)
);
INSERT INTO alunos
(nome, nota)
VALUES
  ('Clarisse', ROUND(RAND() * (10 - 0))),
  ('Alberto', ROUND(RAND() * (10 - 0))),
  ('Juca', ROUND(RAND() * (10 - 0))),
  ('Roberto', ROUND(RAND() * (10 - 0))),
  ('Fabiane', ROUND(RAND() * (10 - 0))),
  ('Tim', ROUND(RAND() * (10 - 0))),
  ('Mariana', ROUND(RAND() * (10 - 0))),
  ('Tones', ROUND(RAND() * (10 - 0))),
  ('Lucas', ROUND(RAND() * (10 - 0))),
  ('Marcos', ROUND(RAND() * (10 - 0))),
  ('Júlia', ROUND(RAND() * (10 - 0))),
  ('Manoel', ROUND(RAND() * (10 - 0))),
  ('Jussara', ROUND(RAND() * (10 - 0))),
  ('Jonas', ROUND(RAND() * (10 - 0))),
  ('Cristiane', ROUND(RAND() * (10 - 0))),
  ('Carina', ROUND(RAND() * (10 - 0))),
  ('Débora', ROUND(RAND() * (10 - 0))),
  ('Rodrigo', ROUND(RAND() * (10 - 0))),
  ('Andréia', ROUND(RAND() * (10 - 0))),
  ('Aimara', ROUND(RAND() * (10 - 0)));

