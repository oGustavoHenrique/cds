<?php 
require_once "DB.php";
$db = new DB();

$sql = "SELECT * FROM artista";
$dadosArtista = $db->consultar($sql);

$sql = "SELECT * FROM estilo";
$dadosEstilo = $db->consultar($sql);

$sql = "SELECT * FROM gravadora";
$dadosGravadora = $db->consultar($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar CD</title>
</head>
<body>
    <form method="post" action="processa.php">
        Titulo: <input type="text" name="titulo">
        Ano de lançamento: <input type="int" name="ano">
        Artista: <select name="artista">
            <?php foreach($dadosArtista as $dados){ ?>
                <option value="<?=$dados['idArtista']?>"><?=$dados['nome']?></option>
            <?php }; ?>
        </select>
        Estilo: <select name="estilo">
            <?php foreach($dadosEstilo as $dados){ ?>
                <option value="<?=$dados['idEstilo']?>"><?=$dados['identificacao']?></option>
            <?php }; ?>
        </select>
        Gravadira: <select name="gravadora">
            <?php foreach($dadosGravadora as $dados){ ?>
                <option value="<?=$dados['idGravadora']?>"><?=$dados['identificacao']?></option>
            <?php }; ?>
        </select>
        <input type="submit" name="botao" value="Adicionar CD">
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>