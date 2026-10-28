<?php
// SISTEMA DE CONTROLE DE PRODUÇÃO INDUSTRIAL

// 1. CLASSE ABSTRATA
abstract class Maquina {
    public $nome;
    private $producao;

    public function __construct($nome)
    {
        $this->nome = $nome;
        $this->producao = 0;
    }

    //ENCAPSULAMENTO - GETTER
    public function getProducao() {
        return $this->producao;
    }

    //ENCAPSULAMENTO - ALTERAÇÃO CONTROLADA
    public function registrarProducao($quantidade) {
        if ($quantidade <= 0) {
            return false;
        }

        $this->producao += $quantidade;
        return true;
    }

    //ABSTRAÇÃO
    abstract public function operar();
}

// 2. HERANÇA
class Esteira extends Maquina {
    public function operar() {
        return "Transportando peças...";
    }
}

class Prensa extends Maquina {
    public function operar() {
        return "Prensando peças...";
    }
}

class RoboSoldagem extends Maquina {
    public function operar() {
        return "Soldando peças...";
    }
}

// 3. SESSÃO = ARMAZENAMENTO TEMPORÁRIO

if (!isset($_SESSION["maquinas"])) {
    $_SESSION["maquinas"] = [];
}

$mensagem = "";

//4. RECEBER FORMULÁRIO VIA POST

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"] ?? "";
    $tipo = $_POST["tipo"] ?? "";
    $quantidade = $_POST["quantidade"] ?? null;

    if(
        $nome === "" ||
        $quantidade === false ||
        $quantidade <=0
    ) {
        $mensagem = "Preencha os campos corretamente!";
    } else {
        //CRIANDO OBJETOS COM BASE NO FORMULÁRIO
        if ($tipo === "esteira") {
            $maquina = new Esteira($nome);
        } elseif ($tipo === "prensa") {
            $maquina = new prensa($nome);
        } elseif ($tipo === "robosoldagem") {
            $maquina = new RoboSoldagem($nome);
        }

        //EXECUTANDO OS MÉTODOS DO OBJETO
        $maquina->registrarProducao($quantidade);

        // GUARDANDO O OBJETO NA SESSÃO
        $_SESSION["maquinas"][] = $maquina;

        $mensagem = "Máquina cadastrada com sucesso!";
    }
}

//Evitar interpretar textos como HTML
function escapar($texto) {
    return htmlspecialchars(
        (string) $texto,
        ENT_QUOTES,
        "UTF-8");
}
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/poo2.css">
</head>
<body>
    <header class="topo">
        <a href="/index.php" class="voltar">← Voltar ao portfólio</a>
        <span>Programação Orientada a Objetos</span>
    </header>

    <main class="pagina">
        <section class="introducao">
            <p class="etiqueta">ATIVIDADE DE PHP</p>
            <h1>Controle de Produção Industrial</h1>
            <p>Cadastre máquinas e registre a quantidade de peças produzidas.</p>
        </section>

        <section class="cartao">
            <h2>Cadastrar máquina</h2>

            <?php if ($mensagem !== ""): ?>
                <p class="mensagem"><?= escapar($mensagem) ?></p>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="campo">
                    <label for="nome">Nome da máquina</label>
                    <input type="text" id="nome" name="nome" maxlength="80" required>
                </div>
</body>
</html>