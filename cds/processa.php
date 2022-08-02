<?php
include "DB.php";
$db = new DB();

if(isset($_POST['botao'])){
    if($_POST['botao']=='Adicionar estilo'){
        $verifica = $db->consultar("SELECT * FROM estilo WHERE identificacao = '{$_POST['estilo']}'");
        if($verifica){
            echo ("Este estilo já está cadastrado."); die;
        }else{
            $sql = "insert into estilo (identificacao) values('{$_POST['estilo']}')";
            $resultado = $db->manipular($sql);
            header("location: index.php");
        }
    }else if($_POST['botao']=='Adicionar artista'){
        $verifica = $db->consultar("SELECT * FROM artista WHERE nome = '{$_POST['artista']}'");
        if($verifica){
            echo ("Este artista já está cadastrado."); die;
        }else{
            $sql = "insert into artista (nome) values('{$_POST['artista']}')";
            $resultado = $db->manipular($sql);
            header("location: index.php");
        }
    }else if($_POST['botao']=='Adicionar gravadora'){
        $verifica = $db->consultar("SELECT * FROM gravadora WHERE identificacao = '{$_POST['gravadora']}'");
        if($verifica){
            echo ("Esta gravadora já está cadastrada."); die;
        }else{
            $sql = "insert into gravadora (identificacao) values('{$_POST['gravadora']}')";
            $resultado = $db->manipular($sql);
            header("location: index.php");
        }
    }else if($_POST['botao']=='Adicionar CD'){
        $verifica = $db->consultar("SELECT * FROM cd WHERE titulo = '{$_POST['titulo']}'");
        if($verifica){
            echo ("Esta gravadora já está cadastrada."); die;
        }else{
            $sql = "insert into cd (titulo, ano, artista_idArtista, gravadora_idGravadora, estilo_idEstilo) values('{$_POST['titulo']}','{$_POST['ano']}','{$_POST['artista']}','{$_POST['gravadora']}','{$_POST['estilo']}')";
            $resultado = $db->manipular($sql);
            header("location: index.php");
    }
    
}}?>
