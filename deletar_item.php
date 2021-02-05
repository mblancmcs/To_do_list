<?php

    require_once('conexao_bd.php');

    session_start();

    $objDb = new db;
    $link = $objDb->conecta_mysql();

    $deletar_item_conteudo = $_POST['deletar_item'];
    /* -- Quando tentei usar pela SESSION --
    
    $id_conteudo = $_SESSION['id_conteudo'];
    echo '<pre>';
    print_r($id_conteudo);
    echo '</pre>';
    */
    $sql = "DELETE FROM tb_lista WHERE conteudo = '$deletar_item_conteudo'";

    if(mysqli_query($link, $sql)){

        $sql = "SELECT id_conteudo FROM tb_lista WHERE conteudo = '$deletar_item_conteudo' ";

        if($id_conteudo = mysqli_query($link, $sql)){

            $sql = "INSERT INTO tb_concluido(fk_id_conteudo, fk_conteudo) VALUES($id_conteudo, '$deletar_item_conteudo') ";

            header('Location: home.php');

        } else {
            echo 'Erro na query';
        }
    } else {
        echo 'Erro ao executar a query';
    }


?>