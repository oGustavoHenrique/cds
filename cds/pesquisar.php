<?php

require_once "DB.php";
$db = new DB();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Busca</title>
</head>
<body>
    <h1>Lista de Veículos</h1>
    <form action="">
        <input name="busca" value="<?php if(isset($_GET['busca'])) echo $_GET['busca']; ?>" placeholder="Digite os termos de pesquisa" type="text">
        <button type="submit">Pesquisar</button>
    </form>
    <br>
    <table width="600px" border="1">
        <tr>
            <th>Titulo</th>
            <th>Ano</th>
            <th>Artista</th>
            <th>Gravadora</th>
            <th>Estilo</th>
        </tr>
        <?php
        if (!isset($_GET['busca'])) {
            ?>
        <tr>
            <td colspan="3">Digite algo para pesquisar...</td>
        </tr>
        <?php
        } else {
            $pesquisa = $_GET['busca'];
            $sql = "SELECT * 
                FROM cd, artista, gravadora, estilo 
                WHERE titulo LIKE '%$pesquisa%' 
                OR ano LIKE '%$pesquisa%'
                OR artista.idArtista = artista_idArtista and artista.nome LIKE '%$pesquisa%'
                OR gravadora.idGravadora = gravadora_idGravadora and gravadora.identificacao LIKE '%$pesquisa%'
                OR estilo.idEstilo = estilo_idEstilo and estilo.identificacao LIKE '%$pesquisa%'";
            $resultados = $db->consultar($sql);
            foreach($resultados as $dados)
                    ?>
                    <tr>
                        <td><?php echo $dados['titulo']; ?></td>
                        <td><?php echo $dados['ano']; ?></td>
                        <td><?php echo $dados['artista_idArtista']; ?></td>
                        <td><?php echo $dados['gravadora_idGravadora']; ?></td>
                        <td><?php echo $dados['estilo_idEstilo']; ?></td>
                    </tr>
                    <?php
                }
            ?>
    </table>
</body>
</html>
