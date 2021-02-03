<?php

    require_once('conexao_bd.php');

    session_start();

    $nome_usuario = $_POST['nome_usuario'];
    $senha_usuario = md5($_POST['senha_usuario']);

    $objDb = new db;
    $link = $objDb->conecta_mysql();

    $sql = "SELECT * FROM tb_usuario WHERE usuario = '$nome_usuario'";

    $resultado_id = mysqli_query($link, $sql);

    if($resultado_id){
        $dados_usuario = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);

        if(isset($dados_usuario['usuario'])){
            $_SESSION['nome_usuario'] = $nome_usuario;
            $_SESSION['senha_usuario'] = $senha_usuario;
            $_SESSION['email_usuario'] = $dados_usuario['email'];
            $_SESSION['id_usuario'] = $dados_usuario['id_usuario'];

            header('Location: home.php');

        }

    } else {
        echo 'Problema com a query';
    }

?>