<?php
session_start();

// Classe principal das máquinas
abstract class Maquina {
    public $nome;
    private $producao;

    public function __construct($nome) {
        $this->nome = $nome;
        $this->producao = 0;
    }

    public function getProducao() {
        return $this->producao;
    }

    public function registrarProducao($quantidade) {
        if ($quantidade <= 0) {
            return false;
        }

        $this->producao += $quantidade;
        return true;
    }

    abstract public function operar();
}

// Tipos de máquinas (herança)
class Esteira extends Maquina {
    public function operar() {
        return "Transportando peças";
    }
}

class Prensa extends Maquina {
    public function operar() {
        return "Prensando peças";
    }
}

class RoboSoldagem extends Maquina {
    public function operar() {
        return "Soldando peças";
    }
}

// Lista de máquinas guardada durante a sessão
if (!isset($_SESSION["maquinas"])) {
    $_SESSION["maquinas"] = [];
}

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST["nome"] ?? "");
    $tipo = $_POST["tipo"] ?? "";
    $quantidade = filter_input(INPUT_POST, "quantidade", FILTER_VALIDATE_INT);

    if ($nome === "" || $quantidade === false || $quantidade === null || $quantidade <= 0) {
        $mensagem = "Preencha todos os campos e informe uma quantidade maior que zero.";
    } else {
        if ($tipo === "esteira") {
            $maquina = new Esteira($nome);
        } elseif ($tipo === "prensa") {
            $maquina = new Prensa($nome);
        } elseif ($tipo === "robosoldagem") {
            $maquina = new RoboSoldagem($nome);
        } else {
            $maquina = null;
        }

        if ($maquina === null) {
            $mensagem = "Selecione um tipo de máquina válido.";
        } else {
            $maquina->registrarProducao($quantidade);
            $_SESSION["maquinas"][] = $maquina;
            $mensagem = "Máquina cadastrada com sucesso!";
        }
    }
}

function escapar($texto) {
    return htmlspecialchars((string) $texto, ENT_QUOTES, "UTF-8");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Produção Industrial</title>
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

                <div class="campo">
                    <label for="tipo">Tipo de máquina</label>
                    <select id="tipo" name="tipo" required>
                        <option value="">Selecione uma opção</option>
                        <option value="esteira">Esteira</option>
                        <option value="prensa">Prensa</option>
                        <option value="robosoldagem">Robô de soldagem</option>
                    </select>
                </div>

                <div class="campo">
                    <label for="quantidade">Quantidade de peças produzidas</label>
                    <input type="number" id="quantidade" name="quantidade" min="1" step="1" required>
                </div>

                <button type="submit">Cadastrar máquina</button>
            </form>
        </section>

        <section class="cartao">
            <h2>Máquinas cadastradas</h2>

            <?php if (empty($_SESSION["maquinas"])): ?>
                <p class="vazio">Nenhuma máquina cadastrada ainda.</p>
            <?php else: ?>
                <div class="tabela-responsiva">
                    <table>
                        <thead>
                            <tr>
                                <th>Máquina</th>
                                <th>Operação</th>
                                <th>Peças produzidas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($_SESSION["maquinas"] as $maquina): ?>
                                <tr>
                                    <td><?= escapar($maquina->nome) ?></td>
                                    <td><?= escapar($maquina->operar()) ?></td>
                                    <td><?= escapar($maquina->getProducao()) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>