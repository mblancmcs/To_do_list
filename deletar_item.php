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

            $sql = "INSERT INTO tb_concluido(fk_conteudo) VALUES('$deletar_item_conteudo') "; //Resolvido: tirei o VALUE passado pro fk_id_conteudo com o $id-conteudo, pois pensei que se essa recuperação já está acontecendo por ela ser uma chave estrangeira, a mesma talvez não possa ser passada como parâmetro da intrução SQL

            header('Location: home.php');

        } else {
            echo 'Erro na query';
        }
    } else {
        echo 'Erro ao executar a query';
    }


?>