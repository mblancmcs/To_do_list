<?php

    require_once('conexao_bd.php');

    session_start();

    echo $id_usuario = $_SESSION['id_usuario'];
    echo $email_usuario = $_SESSION['email_usuario'];

    $objDb = new db;
    $link = $objDb->conecta_mysql();

    $sql = "SELECT conteudo FROM tb_lista WHERE fk_id_usuario = $id_usuario";

    $dados_query = array();

    if($resultado_query = mysqli_query($link, $sql)){
        while($linha = mysqli_fetch_array($resultado_query, MYSQLI_ASSOC)){
            $dados_query[] = $linha;
        }
    } else {
        echo 'Query de consulta dos itens com problema';
    }

?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Let's Work</title>

    <style></style>

    <script language="javascript">
    
    //JQuery

    </script>

    <!--Colocar aqui o link para o Bootstrap 4-->

</head>

<body>

    <article>
        <section>
            <h2>Cadastrar item na lista</h2>
            <form action="cadastro_lista.php" method="post">
                <label for="item">Digite um item:</label>
                <input type="text" id="item" name="usuario_item" required/>

                <button type="submit" >Adicionar</button>

            </form>
        </section>
        <section>
            <h2>Marcar item como concluído</h2>
            <form method= "post" action="deletar_item.php">
                <label for="deletar_item">Digite o nome do item:</label>
                <input type="text" id="deletar_item" name="deletar_item" />

                <button type="submit" >Deletar</button>

            </form>
        </section>
        <section>
            <h2>Lista de Tarefas - A fazer</h2>
            <div>
                <?php
                $tamanho_array = count($dados_query);
                for($i = 0; $i < $tamanho_array; $i++){
                    echo $dados_query[$i]['conteudo'];
                    echo '<br />';
                }
                ?>
            </div>
        </section>
        <section>
            <h2>Lista de tarefas - Itens Concluídos</h2>

        </section>
        <section>
            <a href="sair.php">Sair</a>
        </section>
        
    </article>

</body>

</html>