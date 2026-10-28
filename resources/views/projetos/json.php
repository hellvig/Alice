<?php
$caminho = __DIR__ . "/../../../storage/data/dados.json";

if (!file_exists($caminho)) {
    $pasta = dirname($caminho);

    if (!is_dir($pasta)) {
        mkdir($pasta, 0775, true);
    }

    file_put_contents($caminho, "[]");
}

$json = file_get_contents($caminho);
$alunos = json_decode($json, true);

if (!is_array($alunos)) {
    $alunos = [];
}

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $acao = $_POST["acao"] ?? "";
    $nome = trim($_POST["nome"] ?? "");
    $idade = $_POST["idade"] ?? "";
    $curso = trim($_POST["curso"] ?? "");

    if ($acao === "cadastrar" && $nome !== "" && $idade !== "" && $curso !== "") {
        $alunos[] = [
            "nome" => $nome,
            "idade" => $idade,
            "curso" => $curso
        ];

        $mensagem = "Aluno cadastrado com sucesso!";

    } elseif ($acao === "atualizar" && $nome !== "" && $idade !== "" && $curso !== "") {
        $encontrou = false;

        foreach ($alunos as $posicao => $aluno) {
            if (isset($aluno["nome"]) && $aluno["nome"] === $nome) {
                $alunos[$posicao]["idade"] = $idade;
                $alunos[$posicao]["curso"] = $curso;
                $encontrou = true;
                break;
            }
        }

        $mensagem = $encontrou
            ? "Cadastro atualizado!"
            : "Aluno não encontrado.";

    } elseif ($acao === "deletar" && $nome !== "") {
        $encontrou = false;

        foreach ($alunos as $posicao => $aluno) {
            if (isset($aluno["nome"]) && $aluno["nome"] === $nome) {
                unset($alunos[$posicao]);
                $encontrou = true;
                break;
            }
        }

        $alunos = array_values($alunos);

        $mensagem = $encontrou
            ? "Cadastro excluído!"
            : "Aluno não encontrado.";

    } else {
        $mensagem = "Preencha os campos corretamente.";
    }

    file_put_contents(
        $caminho,
        json_encode(
            $alunos,
            JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
        )
    );
}

function escaparTexto($texto) {
    return htmlspecialchars((string)$texto, ENT_QUOTES, "UTF-8");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Alunos</title>
    <link rel="stylesheet" href="../../css/style_09.css">
</head>
<body>

    <h1>Cadastro de Alunos</h1>

    <?php if ($mensagem !== ""): ?>
        <p><?= escaparTexto($mensagem) ?></p>
    <?php endif; ?>

    <h2>Cadastrar aluno</h2>

    <form method="POST">
        <label for="nome-cadastrar">Nome:</label>
        <input id="nome-cadastrar" type="text" name="nome" required>

        <label for="idade-cadastrar">Idade:</label>
        <input id="idade-cadastrar" type="number" name="idade" min="1" required>

        <label for="curso-cadastrar">Curso:</label>
        <input id="curso-cadastrar" type="text" name="curso" required>

        <button type="submit" name="acao" value="cadastrar">Cadastrar</button>
    </form>

    <h2>Alunos cadastrados</h2>

    <?php if (empty($alunos)): ?>
        <p>Nenhum aluno cadastrado.</p>
    <?php else: ?>
        <?php foreach ($alunos as $aluno): ?>
            <?php if (is_array($aluno)): ?>
                <p><strong><?= escaparTexto($aluno["nome"] ?? "") ?></strong></p>
                <p>Idade: <?= escaparTexto($aluno["idade"] ?? "") ?></p>
                <p>Curso: <?= escaparTexto($aluno["curso"] ?? "") ?></p>
                <hr>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>

    <h2>Atualizar aluno</h2>

    <form method="POST">
        <label for="nome-atualizar">Nome atual do aluno:</label>
        <input id="nome-atualizar" type="text" name="nome" required>

        <label for="idade-atualizar">Nova idade:</label>
        <input id="idade-atualizar" type="number" name="idade" min="1" required>

        <label for="curso-atualizar">Novo curso:</label>
        <input id="curso-atualizar" type="text" name="curso" required>

        <button type="submit" name="acao" value="atualizar">Atualizar</button>
    </form>

    <h2>Excluir aluno</h2>

    <form method="POST">
        <label for="nome-deletar">Nome do aluno:</label>
        <input id="nome-deletar" type="text" name="nome" required>

        <button type="submit" name="acao" value="deletar">Excluir</button>
    </form>

</body>
</html>