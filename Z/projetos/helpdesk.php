<?php
require_once "helpdesk-func.php";

$mensagem = "";

// Identificar a operação solicitada
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //O operador ?? é chamado de operador de coalescência nula.
    //Ele significa:
    //"Utilize o valor da esquerda, se ele existir e não for nulo. Caso contrário, utilize o valor da direita."
    $sacao = $_POST["acao"] ?? "";
    //if (isset($_POST["acao"])) {
    //    $acao = $_POST["acao"];
    // } else {
    //    $acao = "";
    // }

    if ($acao === "cadastrar") {
        $sucesso = cadastrarChamados(
            $_POST["nome"] ?? "",
            $_POST["setor"] ?? "",
            $_POST["equipamento"] ?? "",
            $_POST["descricao"] ?? "",
            $_POST["prioridade"] ?? ""
        );

        $mensagem = $sucesso ? "Chamado cadastrado com sucesso!" : "Erro ao cadastrar. Verifique os dados.";
    }

    if ($sacao === "atualizar") {
        $sucesso = atualizarChamado(
            (int) ($_POST["posicao"] ?? -1),
            $_POST["status"] ?? ""
        );

        $mensagem = $sucesso ? "Chamado cadastrado com sucesso!" : "Erro ao cadastrar. Verifique os dados.";
    }

    if ($acao === "atualizar") {
        $sucesso = atualizarChamado(
            (int) ($_POST["posicao"] ?? -1),
            $_POST["status"] ?? ""
        );

        $mensagem = $sucesso ? "status atualizado!" : "Não foi possível atualizar.";
    }

    if ($acao === "excluir") {
        $sucesso = excluirChamados((int) ($_POST["posicao"] ?? -1));

        $mensagem = $sucesso ? "Chamado excluido!" : "Não foi possível excluir.";
    }
}

$chamados = lerChamados();
$relatorio = gerarRelatorios();

// Evite exibir HTML enviado pelo usuário
function escapar($valor) {
    return htmlspecialchars((string) $valor, ENT_QUOTES, "UTF-8");
}

?>

