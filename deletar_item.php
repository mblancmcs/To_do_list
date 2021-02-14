<?php

    require_once('conexao_bd.php');

    session_start();

    $objDb = new db;
    $link = $objDb->conecta_mysql();

    $deletar_item_conteudo = $_POST['deletar_item'];
    
    $id_usuario = $_SESSION['id_usuario'];

    $sql = "SELECT conteudo FROM tb_lista WHERE conteudo = '$deletar_item_conteudo'";

    $conteudo_lista = array();

    if($resultado_query = mysqli_query($link, $sql)){

        $conteudo_lista = mysqli_fetch_array($resultado_query);
        
    } else {
        die(mysqli_error($link));
    }

    if($conteudo_lista[0] == $deletar_item_conteudo){

        $sql = "INSERT INTO tb_concluido(fk_id_usuario, conteudo_concluido) VALUES($id_usuario, '$deletar_item_conteudo') "; //Atenção: troquei a tabela que tinha o fk_id_conteudo e coloquei um fk_id_usuario e funcionou, não entendi o por quê.
    
        mysqli_query($link, $sql) or die(mysqli_error($link));

        $sql = "DELETE FROM tb_lista WHERE conteudo = '$deletar_item_conteudo'";

        if(mysqli_query($link, $sql)){

            header('Location: home.php');

        } else {
            echo 'Erro na query' . '<hr />';
            die(mysqli_error($link));
        }

    } else {
        echo 'O conteúdo não existe na tabela "A Fazer"';
    }

    /*
    if(mysqli_query($link, $sql)){
        echo 'insert realizado';
    } else {

        echo 'erro na query';
    }
    */

    


?>