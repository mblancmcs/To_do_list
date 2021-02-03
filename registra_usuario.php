<?php

    require_once('conexao_bd.php');

    session_start();

    $nome_usuario = $_POST['nome_usuario'];
    $email_usuario = $_POST['email_usuario'];
    $senha_usuario = md5($_POST['senha_usuario']);

    $objDb = new db;
    $link = $objDb->conecta_mysql();

    //Para saber se o nome de usuário já existe
    $sql = "SELECT * FROM tb_usuario WHERE usuario = '$nome_usuario'";

    $resultado_id = mysqli_query($link, $sql);
    
    $nome_usuario_existe = false;

    if($resultado_id){
        $dados_usuario = mysqli_fetch_array($resultado_id); //não pode atribuir com o [] depois do nome da variável, e mesmo se não declarar ela antes do tipo array, nessa atribuição, como a função retorna um array, a variável $dados_usuario se torna um array

        if(isset($dados_usuario['usuario'])){
            $nome_usuario_existe = true;
        }

    } else {
        echo 'Houve algum problema na query';
    }

    //Para saber se o email já existe
    $sql = "SELECT * FROM tb_usuario WHERE email = '$email_usuario'";
    
    $resultado_id = mysqli_query($link, $sql);

    $email_usuario_existe = false;

    if($resultado_id){

        $dados_usuario = mysqli_fetch_array($resultado_id);

        if(isset($dados_usuario['email'])){
            $email_usuario_existe = true;
        }

    } else {
        echo 'Houve algum erro ao executar a query';
    }

    if($nome_usuario_existe || $email_usuario_existe){
        $retorno_get = "";

        if($nome_usuario_existe){
            $retorno_get .= 'erro_nome_usuario_existe=1&';
        }

        if($email_usuario_existe){
            $retorno_get .= 'erro_email_usuario_existe=1&';
        }

        header('Location: index.php?' . $retorno_get);
        die();

    }

    $sql = "INSERT INTO tb_usuario (usuario, email, senha) VALUES('$nome_usuario', '$email_usuario', '$senha_usuario' )";
    
    if(mysqli_query($link, $sql)){
        echo 'Usuário registrado com sucesso';
    } else {
        echo 'Erro na query de inserir o usuário';
    }
   

?>