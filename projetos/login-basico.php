<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGINZINHO</title>

    <link rel="stylesheet" href="/CSS/login.css">
</head>

<body>

    <div id="login">

        <h2>Login</h2>

        <form method="POST">

            Usuário:
            <input type="text" name="usuario" class="campo">

            Senha:
            <input type="password" name="senha" class="campo">

            <button type="submit">Entrar</button>

        </form>

        <?php

        $usuario_certo = "bahh";
        $senha_certa = "pao_de_queijo";

        if (isset($_POST["usuario"])) {

            $usuario = $_POST["usuario"];
            $senha = $_POST["senha"];

            if ($usuario == $usuario_certo && $senha == $senha_certa) {
                echo "<p>Login realizado com sucesso</p>";
            } else {
                echo "<p>Usuário ou senha incorretos</p>";
            }
        }

        ?>

    </div>

</body>
</html>

<!--

DIFERENÇA ENTRE GET E POST:

POST:
Quando testei com POST, os dados não apareceram na URL.
A URL continuou assim:

matheus315.devlook.xyz/login-basico.php


GET:
Quando testei com GET, os dados apareceram na URL.

Exemplo:

matheus315.devlook.xyz/login-basico.php?usuario=bahh&senha=pao_de_queijo


Ou seja:

GET envia os dados pela URL.

POST envia os dados sem mostrar eles na URL.

Por isso, para um formulário de login, o POST é mais adequado,
pois o usuário e a senha não aparecem na URL.

-->