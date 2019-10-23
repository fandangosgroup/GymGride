create database GymGride;

use GymGride;

drop table Usuarios;
create Table Usuarios
(
	ID int not null primary key AUTO_INCREMENT,
    nome varchar(50) NOT NULL,
    CPF varchar(12) NOT NULL,
    email varchar(25) NOT NULL,
    senha varchar(200) NOT NULL,
    numero varchar(20),
	token varchar(512),
    ativo BOOL NOT NULL DEFAULT '1',
    nivel INT(1) UNSIGNED NOT NULL DEFAULT '1',
    cadastro DATETIME NOT NULL
) ENGINE=MyISAM ;

INSERT INTO usuario (nome, CPF, email, ) VALUES ('fabegalo', 'Normal', '123', '1', 'fabegalo@gmail.com', '1');

INSERT INTO Usuarios VALUES (NULL, 'teste', 'usuario@teste.com.br', SHA1('123'), '08951558943', '41849234', 'hdfbdhjfhadjkljaskdjaskjdkalsjdaksl', 1, 1, NOW( ), 1, 1);

UPDATE Usuarios
SET CPF = 0895155883
WHERE ID = 1;
SELECT Auto_increment FROM information_schema.tables WHERE table_name='the_table_you_want';
SET @@auto_increment_increment=1;
SELECT NOW();
SET @@global.time_zone = '+3:00';
SET time_zone='America/Sao_Paulo';
SELECT ID_User, Nome, Nivel FROM Usuarios WHERE Senha = SHA1(123);
SELECT * FROM Usuarios;

ALTER TABLE usuarios AUTO_INCREMENT=1;

SELECT ID_User, nivel, ativo FROM Usuarios WHERE email = '123@123' and senha = SHA1(123);

INSERT INTO Usuarios (ID, nome, CPF, email, senha, numero, ativo, nivel, cadastro) VALUES ('NULL', '123', '08951512', '123@123', SHA1(123), '12345', '1', '1', 'NOW()');

UPDATE Usuarios SET token = b470e5427b467c21780cb2c3184f991e202cb962ac59075b964b07152d234b70c4ca4238a0b923820dcc509a6f75849b860631689b2bb36720b346a19422453d WHERE ID = 1