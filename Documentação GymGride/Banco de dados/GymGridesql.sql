drop table Usuarios;

CREATE TABLE Usuarios (
    ID_User int not null auto_increment PRIMARY KEY,
    ID_Pagamento int not null,
    ID_XP int not null,
    ID_Serie int not null,
    ID_photo int not null,
    Nome varchar(30),
    Email varchar(50),
    Senha varchar(100),
    CPF varchar(12),
    Telefone varchar(20),
    Token varchar(512),
    Nivel INT(1) UNSIGNED NOT NULL DEFAULT '1',
    Ativo BOOL NOT NULL DEFAULT '1',
    Dta_Cadastro DATETIME NOT NULL
);

SELECT ID_User, Nome, Nivel FROM Usuarios WHERE Email = 'fabegalo@gmail.com' and Senha = SHA1('galo1414');
drop table userexperience;
CREATE TABLE UserExperience (
    ID_XP int not null auto_increment,
    User_XP int not null,
    Peso_Atual float,
    Altura float,
    Bodyfat float,
    Ativo BOOL NOT NULL DEFAULT '1',
    PRIMARY KEY (ID_XP)
);
drop table pagamento;
CREATE TABLE Pagamento (
    ID_Pagamento int not null auto_increment PRIMARY KEY,
    Cod_Fatura varchar(20),
    Fatura float not null,
    Data_Fatura date,
    Pagamento varchar(20),
    Ativo BOOL NOT NULL DEFAULT '1'
);
drop table series;
CREATE TABLE Series (
    ID_Serie int not null auto_increment,
    ID_Exercicio int not null,
    Cod varchar(2),
    Num_rep int,
    Carga float,
    Tmp_Pausa time,
    Ativo BOOL NOT NULL DEFAULT '1',
    PRIMARY KEY (ID_Serie),
    FOREIGN KEY (ID_Exercicio) REFERENCES Exercicios (ID_Exercicio)
);
drop table exercicios;
CREATE TABLE Exercicios (
    ID_Exercicio int not null auto_increment PRIMARY KEY,
    Nome varchar(50),
    Responsavel varchar(50),
    Relativo int not null,
    Ativo BOOL NOT NULL DEFAULT '1',
    Dta_Registro date
);
drop table photos;
CREATE TABLE Photos (
    ID_photo int not null auto_increment,
    Cod varchar(20),
    Ativo BOOL NOT NULL DEFAULT '1',
    PRIMARY KEY (Id_photo)
);

INSERT INTO Usuarios (ID_User, ID_Pag, Nome, Email, Senha, CPF, Telefone, Nivel, Ativo, Dta_Cadastro) VALUES ('NULL', 'NULL', 'Fabricio', 'fabegalo@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '08951558932', '123', '1', '1', NOW());
INSERT INTO Usuarios (ID_User, Nome, Email, Senha, CPF, Telefone, Nivel, Ativo, Dta_Cadastro) VALUES ('NULL', 'Fabricio', 'fabegalo@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '08951558932', '123', '1', '1', NOW());