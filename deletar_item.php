<?php

    require_once('conexao_bd.php');

    session_start();

    $objDb = new db;
    $link = $objDb->conecta_mysql();

    $deletar_item_conteudo = $_POST['deletar_item'];
    
    $id_usuario = $_SESSION['id_usuario'];

    $sql = "INSERT INTO tb_concluido(fk_id_usuario, conteudo_concluido) VALUES($id_usuario, '$deletar_item_conteudo') "; //Atenção: tirei a fk_id_conteudo e coloquei a fk_id_usuario e funcionou, não entendi o por quê.

    mysqli_query($link, $sql) or die(mysqli_error($link));

    /*
    if(mysqli_query($link, $sql)){
        echo 'insert realizado';
    } else {

        echo 'erro na query';
    }
    */

    $sql = "DELETE FROM tb_lista WHERE conteudo = '$deletar_item_conteudo'";

    if(mysqli_query($link, $sql)){

        header('Location: home.php');

    } else {
        echo 'Erro na query' . '<hr />';
        die(mysqli_error($link));
    }


?>