<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>GYM Gride</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="css/form.css" rel="stylesheet">
        <style>
        body {
        background-image: url('../images/config/fundo.png');
        }
        </style>

    </head>
    <body>
    <form action="SubmitSerie" method="POST">
        <div id="back" class="container-fluid">
            <div id="quadroum" class="form-control">
                    <input type="text" name="aluno" placeholder="aluno"><br>
                    <input type="text" name="serie" placeholder="Execmplo: A"><br>
                    <input type="date" name="date"><br>
                <br>
            </div>
            <div id="quadrodois" class="form-control">
                    <table>
                            <?php
                                foreach ($dados as $dados) {
                                    echo "<tr><td>" .$dados['Nome']. "
                                        <input type='checkbox' name='" . $dados['ID_Exercicio']. "'>
                                        <input type='number' name='repeticao_" .$dados['ID_Exercicio']. "' placeholder = 'repetições'>
                                        <input type='number' name='carga_".$dados['ID_Exercicio']. "' placeholder = 'carga'>
                                        <input type='number' name='pausa_".$dados['ID_Exercicio']."' placeholder = 'pausa' = 'pausa'></td></tr>";
                                }
                            ?>            
                </table>
                <input type="submit" value="criar">
            </form>
            </div>
        </div>
    </body>
</html>