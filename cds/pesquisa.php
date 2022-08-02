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
    <title>Pesquisar</title>
</head>
<body>
    <form action="processa.php" method="post">
        <input type="text" name="Titulo" placeholder="Titulo"></input>
        <input type="number" name="Ano" placeholder="Ano de publicação"></input>
        <select name= "Artista">
            <?php
                foreach($dadosArtista as $valor){ ?>
                    <option value='<?=$valor['idArtista']?>'><?=$valor['nome']?></option>
            <?php }; ?>
        </select>
        <select name="Gravadora">
            <?php
                foreach($dadosGravadora as $valor){ ?>
                    <option value='<?=$valor['idGravadora']?>'><?=$valor['identificacao']?></option>
            <?php }; ?>
        </select>
        <select name="Estilo">
            <?php
                foreach($dadosEstilo as $valor){ ?>
                    <option value='<?=$valor['idEstilo']?>'><?=$valor['identificacao']?></option>
            <?php }; ?>
        </select>
        <input type="submit" name="botao" value="Pesquisar"></input>
    </form>
</body>
</html>