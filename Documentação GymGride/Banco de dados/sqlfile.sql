SELECT * FROM Series WHERE ID_serie = '1';

INSERT INTO Series (ID_Serie, Cod, Num_rep, Carga, ID_exercicio, Tmp_Pausa, Ativo) Values(1, '2323', 5, 24.5, 1, '1:06:00', 1);

SELECT * FROM Series;

delete from usuarios
where ID_User > 1;

select * from Usuarios;

SELECT ID_User, Nome, Nivel FROM Usuarios WHERE Email = 'fabegalo@gmail.com';
INSERT INTO Usuarios (ID_User, Nome, Email, Senha, CPF, Telefone, Nivel, Ativo, Dta_Cadastro) VALUES ('NULL', 'Fabricio', 'fabegalo@gmail.com', '3fe78f72414a4e35f9e75b155ce35a23379dca78', '08951558932', '41 984155903', '1', '1', NOW());

update Usuarios
set Nivel = 3
where ID_User = 4;

Insert into Series Values(1, 1, '09', 15, 25.05, '00:20:00', 1);