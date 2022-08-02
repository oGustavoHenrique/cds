<?php include "DB.php"; 
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
    <h1>Lista de CDS</h1>
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
                FROM cd 
                WHERE titulo LIKE '%$pesquisa%' 
                OR ano LIKE '%$pesquisa%'
                OR artista_idArtista LIKE '%$pesquisa%'
                OR gravadora_idGravadora LIKE '%$pesquisa%'
                OR estilo_idEstilo LIKE '%$pesquisa%'";
            $resultado = $db->consultar($sql);
            if ($resultado->num_rows == 0) {
                ?>
            <tr>
                <td colspan="3">Nenhum db encontrado...</td>
            </tr>
            <?php
            } else {
                while($dados = $resultado) {
                    ?>
                    <tr>
                        <td><?php echo $dados['titulo']; ?></td>
                        <td><?php echo $dados['ano']; ?></td>
                        <td><?php echo $dados['artista']; ?></td>
                        <td><?php echo $dados['gravadora']; ?></td>
                        <td><?php echo $dados['estilo']; ?></td>
                    </tr>
                    <?php
                }
            }
            ?>
        <?php
        } ?>
    </table>
</body>
</html>