<?php

    require_once('conexao_bd.php');

    session_start();

    $objDb = new db;
    $link = $objDb->conecta_mysql();

    $id_usuario = $_SESSION['id_usuario'];

    $sql = "DELETE FROM tb_lista WHERE fk_id_usuario = $id_usuario";

    mysqli_query($link, $sql) or die(mysqli_error($link));

    header('Location: home.php');

?>