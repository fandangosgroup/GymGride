<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Configuração</title>
    <link rel="stylesheet" type="text/css" href="./css/config.css">
    <link rel="irineu" href="images/favicon2.ico" />
</head>
<body>
    <div id="pagina">
        <div class="table inputs input btn button">
            <div class="dados">
                <div class="container">
                <img class="image img" src="photos/123.png">
                <div class="middle">
                    <div class="text">Alterar Foto</div>
                    <input class="photo" type="file" name="photo">
                  </div>
                </div>
            <form action="AtualizaDados" method="POST">
                Nome:<br>
                <input type="text" name="name" value="<?php echo"$dados[User_Name]"; ?>">
                <br>
                <br>
                Email:<br>
                <input type="email" name="email" value="<?php echo"$dados[User_Email]"; ?>">
                <br>
                <br>
                <!--Senha:<br>
                <input type="text" readonly name="password" value="<?php echo"$dados[User_pass]"; ?>">
                <br>
                <br>-->
                Telefone:<br>
                <input type="text" name="tell" value="<?php echo"$dados[User_tell]"; ?>">
                <br>
                <br>
                CPF:<br>
                <input type="text" readonly value="<?php echo"$dados[User_CPF]"; ?>">
                <br>
                <br>
                <input type="submit" value="Alterar">
                <br>
                <br>
                <a href="Dashboard">Voltar</a>
                
            </form>
            </div>
        </div>
    </div>
</body>
</html>