<!DOCTYPE html>
<html lang="PT-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I love pao de queijo</title>
    <linl rel = "stylesheet" href="style.css">
</head>
<body>

<div class="card">

    <?php
echo "<h1>I love pao de queijo</h1>";
$nome = "Alice";
$idade = "18";
?>

<h1> nome: <?= $nome ?> </h1>
<p> idade <?= $idade ?> </p>
    
<p>
        Status:
        <?php if ($idade >=18): ?>
            <strong style="color: green;">Maior de idade</strong>
        <?php else: ?>
            <strong style="color: red;">Menor de idade</strong>
        <?php endif; ?>
</p>
</div>

</body>
</html>