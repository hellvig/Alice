<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio - Média do Aluno</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="card">

    <h1>Calculadora de Média</h1>

    <p>Preencha os dados abaixo para verificar o resultado do aluno.</p>

    <form action="notas-desafio.php" method="GET">

        <div>
            <label>Aluno:</label>
            <input type="text" name="aluno" placeholder="Digite o nome" required>
        </div>

        <div>
            <label>Idade:</label>
            <input type="number" name="idade" placeholder="Digite a idade" required>
        </div>

        <div>
            <label>Primeira nota - Peso 2:</label>
            <input type="number" name="n1" min="0" max="10" step="0.1" required>
        </div>

        <div>
            <label>Segunda nota - Peso 3:</label>
            <input type="number" name="n2" min="0" max="10" step="0.1" required>
        </div>

        <div>
            <label>Terceira nota - Peso 1:</label>
            <input type="number" name="n3" min="0" max="10" step="0.1" required>
        </div>

        <div>
            <label>Quarta nota - Peso 1:</label>
            <input type="number" name="n4" min="0" max="10" step="0.1" required>
        </div>

        <div>
            <label>Quinta nota - Peso 3:</label>
            <input type="number" name="n5" min="0" max="10" step="0.1" required>
        </div>

        <button type="submit">Ver resultado</button>

    </form>


    <?php

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["aluno"])) {

        $aluno = $_GET["aluno"];
        $idade = $_GET["idade"];

        $n1 = $_GET["n1"];
        $n2 = $_GET["n2"];
        $n3 = $_GET["n3"];
        $n4 = $_GET["n4"];
        $n5 = $_GET["n5"];

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
                <?= htmlspecialchars($aluno) ?>
            </p>

            <p>
                <strong>Idade:</strong>
                <?= (int)$idade ?> anos
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

    <?php
    }
    ?>

</div>

</body>
</html>