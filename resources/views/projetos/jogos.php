<?php
require_once __DIR__ . "/../../../config/conexao.php";

$sql = "CREATE TABLE IF NOT EXISTS jogos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100),
    genero VARCHAR(50),
    nota INT
)";

$pdo->exec($sql);

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST["nome"] ?? "");
    $genero = trim($_POST["genero"] ?? "");
    $nota = filter_input(INPUT_POST, "nota", FILTER_VALIDATE_INT);

    if ($nome !== "" && $genero !== "" && $nota !== false
        && $nota !== null && $nota >= 0 && $nota <= 10) {

        $sql = "INSERT INTO jogos (nome, genero, nota)
                VALUES (:nome, :genero, :nota)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ":nome" => $nome,
            ":genero" => $genero,
            ":nota" => $nota
        ]);

        $mensagem = "Jogo cadastrado com sucesso!";
    } else {
        $mensagem = "Preencha os campos corretamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de jogos</title>
    <link rel="stylesheet" href="../../css/jogos.css">
</head>
<body>

    <div class="card">
        <h1>Cadastro de jogos</h1>

        <?php if ($mensagem !== ""): ?>
            <p><?= htmlspecialchars($mensagem, ENT_QUOTES, "UTF-8") ?></p>
        <?php endif; ?>

        <form method="POST">
            <div>
                <label for="nome">Nome do jogo:</label>
                <input type="text" id="nome" name="nome" required>
            </div>

            <div>
                <label for="genero">Gênero:</label>
                <input type="text" id="genero" name="genero" required>
            </div>

            <div>
                <label for="nota">Nota:</label>
                <input type="number" id="nota" name="nota"
                    min="0" max="10" required>
            </div>

            <button type="submit">Cadastrar</button>
        </form>
    </div>

</body>
</html>