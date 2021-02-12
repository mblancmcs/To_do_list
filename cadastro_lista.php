<?php

    require_once('conexao_bd.php');

    session_start();

    $nome_usuario = $_SESSION['nome_usuario'];
    $email_usuario = $_SESSION['email_usuario'];
    $id_usuario = $_SESSION['id_usuario'];
    $conteudo = $_POST['usuario_item'];

    $objDb = new db;
    $link = $objDb->conecta_mysql();

    //$sql = "SELECT id_usuario FROM tb_usuario WHERE usuario = '$nome_usuario' AND email = '$email_usuario' ";
        
    $sql = "INSERT INTO tb_lista(fk_id_usuario, conteudo) VALUES($id_usuario, '$conteudo') ";

    if(mysqli_query($link, $sql)){
        
        $sql = "SELECT id_conteudo FROM tb_lista WHERE conteudo = '$conteudo' ";
    
        if($resultado_query = mysqli_query($link, $sql)){
    
            $registro = mysqli_fetch_array($resultado_query, MYSQLI_ASSOC);
    
            echo $id_conteudo = $registro['id_conteudo'];
    
            if($id_conteudo = mysqli_query($link, $sql)){
                
                $_SESSION['id_conteudo'] = $id_conteudo;
    
            } else {
                echo 'Erro na query';
            }
    
            header('Location: home.php');
            
        } 
        
    } else {
        echo 'Houve um problema ao executar a query';
    }



?>