<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio - Média do Aluno</title>
    <link rel="stylesheet" href="../../css/notas_desafio.css">
</head>
<body>

<div class="card">
    <h1>Calculadora de Média</h1>
    <p>Preencha os dados abaixo para verificar o resultado do aluno.</p>

    <form action="/?rota=notas-desafio" method="GET">
        <div>
            <label for="aluno">Aluno:</label>
            <input type="text" id="aluno" name="aluno"
                placeholder="Digite o nome" required>
        </div>

        <div>
            <label for="idade">Idade:</label>
            <input type="number" id="idade" name="idade"
                placeholder="Digite a idade" required>
        </div>

        <div>
            <label for="n1">Primeira nota - Peso 2:</label>
            <input type="number" id="n1" name="n1"
                min="0" max="10" step="0.1" required>
        </div>

        <div>
            <label for="n2">Segunda nota - Peso 3:</label>
            <input type="number" id="n2" name="n2"
                min="0" max="10" step="0.1" required>
        </div>

        <div>
            <label for="n3">Terceira nota - Peso 1:</label>
            <input type="number" id="n3" name="n3"
                min="0" max="10" step="0.1" required>
        </div>

        <div>
            <label for="n4">Quarta nota - Peso 1:</label>
            <input type="number" id="n4" name="n4"
                min="0" max="10" step="0.1" required>
        </div>

        <div>
            <label for="n5">Quinta nota - Peso 3:</label>
            <input type="number" id="n5" name="n5"
                min="0" max="10" step="0.1" required>
        </div>

        <button type="submit">Ver resultado</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["aluno"])) {
        $aluno = trim($_GET["aluno"] ?? "");
        $idade = (int) ($_GET["idade"] ?? 0);

        $n1 = (float) ($_GET["n1"] ?? 0);
        $n2 = (float) ($_GET["n2"] ?? 0);
        $n3 = (float) ($_GET["n3"] ?? 0);
        $n4 = (float) ($_GET["n4"] ?? 0);
        $n5 = (float) ($_GET["n5"] ?? 0);

        $somaNotas = ($n1 * 2) + ($n2 * 3) + $n3 + $n4 + ($n5 * 3);
        $mediaFinal = $somaNotas / 10;

        if ($mediaFinal >= 7) {
            $resultado = "APROVADO";
            $classe = "aprovado";
        } elseif ($mediaFinal >= 5) {
            $resultado = "RECUPERAÇÃO";
            $classe = "recuperacao";
        } else {
            $resultado = "REPROVADO";
            $classe = "reprovado";
        }
    ?>

        <div class="resultado">
            <h2>Resultado do Aluno</h2>

            <p>
                <strong>Nome:</strong>
                <?= htmlspecialchars($aluno, ENT_QUOTES, "UTF-8") ?>
            </p>

            <p>
                <strong>Idade:</strong>
                <?= $idade ?> anos
            </p>

            <p>
                <strong>Média final:</strong>
                <?= number_format($mediaFinal, 1, ',', '.') ?>
            </p>

            <p>
                <strong>Situação:</strong>
                <span class="<?= $classe ?>">
                    <?= $resultado ?>
                </span>
            </p>
        </div>

    <?php } ?>
</div>

</body>
</html>