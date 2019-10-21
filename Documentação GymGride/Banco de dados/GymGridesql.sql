
CREATE TABLE Usuarios (
    ID_User int not null auto_increment PRIMARY KEY,
    ID_Pagamento int not null,
    ID_XP int not null,
    ID_Serie int not null,
    ID_photo int not null,
    Nome varchar(30),
    Email varchar(50),
    Senha varchar(30),
    CPF varchar(12),
    Telefone varchar(20),
    Token varchar(512),
    Nivel INT(1) UNSIGNED NOT NULL DEFAULT '1',
    Ativo BOOL NOT NULL DEFAULT '1',
    Dta_Cadastro DATETIME NOT NULL,
    FOREIGN KEY (ID_Pagamento) REFERENCES Pagamento (ID_Pagamento),
    FOREIGN KEY (ID_XP) REFERENCES UserExperience (ID_XP),
    FOREIGN KEY (ID_Serie) REFERENCES Series (ID_Serie),
    FOREIGN KEY (ID_photo) REFERENCES Photo (ID_photo)
);

CREATE TABLE UserExperience (
    ID_XP int not null auto_increment,
    User_XP int not null,
    Peso_Atual float,
    Altura float,
    Bodyfat float,
    Ativo BOOL NOT NULL DEFAULT '1',
    PRIMARY KEY (ID_XP, Serie)
);

CREATE TABLE Pagamento (
    ID_Pagamento int not null auto_increment PRIMARY KEY,
    Cod_Fatura varchar(20),
    Fatura float not null,
    Data_Fatura date,
    Pagamento varchar(20),
    Ativo BOOL NOT NULL DEFAULT '1'
);

CREATE TABLE Series (
    ID_Serie int not null auto_increment,
    ID_Exercicio int not null,
    Cod varchar(2),
    Num_rep int,
    Carga float,
    ID_exercicio int,
    Tmp_Pausa time,
    Ativo BOOL NOT NULL DEFAULT '1',
    PRIMARY KEY (ID_Serie, ID_exercicio),
    FOREIGN KEY (ID_Exercicio) REFERENCES Exercicios (ID_Exercicio)
);

CREATE TABLE Exercicios (
    ID_Exercicio int not null auto_increment PRIMARY KEY,
    Nome varchar(50),
    Responsavel varchar(50),
    Relativo int not null,
    Ativo BOOL NOT NULL DEFAULT '1',
    Dta_Registro date
);

CREATE TABLE Photos (
    ID_photo int not null auto_increment,
    Cod varchar(20),
    Id_User int not null,
    Ativo BOOL NOT NULL DEFAULT '1',
    PRIMARY KEY (Id_photo, Id_User)
);