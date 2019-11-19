<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adicionar Serie</title>
    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <link rel="stylesheet" type="text/css" href="./css/series.css">
</head>
<body>



    <div class="highlights">
        <div class="content">
           
       
    <form action="SubmitSerie" method="POST">


        <input type="text" name="aluno" placeholder="aluno"><br>
        <input type="text" name="serie" placeholder="Execmplo: A"><br>
        <input type="date" name="date"><br>
       
        
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