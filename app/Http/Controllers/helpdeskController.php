<?php

require_once __DIR__ . "/../../Models/Chamado.php";

class HelpdeskController
{
    public function index()
    {
        $model = new Chamado();

        $chamados = $model->lerChamados();
        $relatorio = $model->gerarRelatorios();
        $mensagem = "";

        require __DIR__ . "/../../../resources/views/projetos/helpdesk.php";
    }

    public function salvar()
    {
        $model = new Chamado();

        $acao = $_POST["acao"] ?? "";
        $sucesso = false;

        if ($acao === "cadastrar") {
            $sucesso = $model->cadastrarChamados(
                $_POST["nome"] ?? "",
                $_POST["setor"] ?? "",
                $_POST["equipamento"] ?? "",
                $_POST["descricao"] ?? "",
                $_POST["prioridade"] ?? ""
            );
        } elseif ($acao === "atualizar") {
            $sucesso = $model->atualizarChamado(
                (int) ($_POST["posicao"] ?? -1),
                $_POST["status"] ?? ""
            );
        } elseif ($acao === "excluir") {
            $sucesso = $model->excluirChamados(
                (int) ($_POST["posicao"] ?? -1)
            );
        }

        $mensagem = $sucesso
            ? "Operação realizada com sucesso!"
            : "Não foi possível realizar a operação.";

        $chamados = $model->lerChamados();
        $relatorio = $model->gerarRelatorios();

        require __DIR__ . "/../../../resources/views/projetos/helpdesk.php";
    }
}