<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Let's Work</title>
</head>

<body>

    <article>
        <section>
            <h2>Registre-se</h2>
            <form action="registra_usuario.php" method="post">
                <label for="nome">Digite o seu nome:</label>
                <input type="text" id="nome" name="nome_usuario" required/>
                
                <br />
                <label for="email">Digite o seu email:</label>
                <input type="email" placeholder="teste@teste.com.br" id="email" name="email_usuario" required />

                <br />
                <label for="senha">Digite a sua senha:</label>
                <input type="password" id="senha" name="senha_usuario" required />

                <button type="submit" >Enviar</button>

            </form>
        </section>
        <section>
            <h2>Login</h2>
            <form action="login.php" method="post">
                <label for="nome">Digite o seu nome:</label>
                <input type="text" id="nome" name="nome_usuario" required/>
                
                <br />
                <label for="senha">Digite a sua senha:</label>
                <input type="password" id="senha" name="senha_usuario" required />

                <button type="submit" >Enviar</button>

            </form>
        </section>
    </article>

</body>

</html>