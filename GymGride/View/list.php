<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
    <link rel="stylesheet" type="text/css" href="/css/list.css">
</head>
<body>
    <div id="customers">
    <table  border=1 id="customers">
            <tr>
                <th> ID_Serie </th>
                <th> ID_Exercicio </th>
                <th> Cod </th>
                <th> Num_rep </th>
                <th> Carga </th>
                <th> Tmp_Pausa </th>
                <th> Ativo</th>
			
            </tr>
            <?php
                foreach($dados as $dados) {?>

                <tr>
                    <td><?php echo $dados['ID_Serie']; ?></td>
                    <td><?php echo $dados['ID_Exercicio']; ?></td>
                    <td><?php echo $dados['Cod']; ?></td>
                    <td><?php echo $dados['Num_rep']; ?></td>
                    <td><?php echo $dados['Carga']; ?></td>
                    <td><?php echo $dados['Tmp_Pausa']; ?></td>
                    <td><?php echo $dados['Ativo']; ?></td>
                </tr>
            
            <?php }?>
    </table>
    </div>
</body>
</html>