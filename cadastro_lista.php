<?php

    require_once('conexao_bd.php');

    session_start();

    $nome_usuario = $_SESSION['nome_usuario'];
    $email_usuario = $_SESSION['email_usuario'];
    $id_usuario = $_SESSION['id_usuario'];
    $conteudo = $_POST['usuario_item'];

    $objDb = new db;
    $link = $objDb->conecta_mysql();

    echo $sql = "SELECT id_usuario FROM tb_usuario WHERE usuario = '$nome_usuario' AND email = '$email_usuario' ";

    if(mysqli_query($link, $sql)){
        
        $sql = "INSERT INTO tb_lista(fk_id_usuario, conteudo) VALUES($id_usuario, '$conteudo') ";

        mysqli_query($link, $sql);

        header('Location: home.php');

    } else {
        echo 'Houve um problema ao executar a query';
    }



?>