<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGINZINHO</title>
    <link rel="stylesheet" href="../../css/login.css">
</head>
<body>

    <div id="login">
        <h2>Login</h2>

        <form method="POST">
            Usuário:
            <input type="text" name="usuario" class="campo" required>

            Senha:
            <input type="password" name="senha" class="campo" required>

            <button type="submit">Entrar</button>
        </form>

        <?php
        $usuario_certo = "admin";
        $senha_certa = "12345";

        if (isset($_POST["usuario"])) {
            $usuario = $_POST["usuario"];
            $senha = $_POST["senha"] ?? "";

            if ($usuario === $usuario_certo && $senha === $senha_certa) {
                echo "<p>Login realizado com sucesso</p>";
            } else {
                echo "<p>Usuário ou senha incorretos</p>";
            }
        }
        ?>
    </div>

</body>
</html>