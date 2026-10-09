<?php

// 1. DECLARAR O CAMINHO DO ARQUIVO JSON
$caminho = __DIR__ . "/chamados.json";

// 2. CRIAR AS FUNÇÕES

function consultarChamados() {
    global $caminho;

    // LER O ARQUIVO JSON
    $json = file_get_contents($caminho);

    // TRANSFORMAR JSON EM ARRAY PHP
    $chamados = json_decode($json, true);

    if (!is_array($chamados)) {
        $chamados = [];
    }

    return $chamados;
}

function salvarChamados($chamados) {
    global $caminho;

    // TRANSFORMAR ARRAY PHP EM JSON
    $jsonAtualizado = json_encode(
        $chamados,
        JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
    );

    // SALVAR NO ARQUIVO
    file_put_contents($caminho, $jsonAtualizado);
}

function cadastrarChamado($nome, $setor, $equipamento, $descricao, $prioridade) {

    // CONSULTAR OS CHAMADOS EXISTENTES
    $chamados = consultarChamados();

    // CRIAR UM NOVO CHAMADO
    $novoChamado = [
        "nome" => $nome,
        "setor" => $setor,
        "equipamento" => $equipamento,
        "descricao" => $descricao,
        "prioridade" => $prioridade,
        "status" => "Aberto"
    ];

    // ADICIONAR O CHAMADO NO ARRAY
    $chamados[] = $novoChamado;

    // SALVAR OS DADOS
    salvarChamados($chamados);
}

function atualizarChamado($posicao, $novoStatus) {

    // CONSULTAR OS CHAMADOS EXISTENTES
    $chamados = consultarChamados();

    // VALIDAR OS STATUS PERMITIDOS
    $statusPermitidos = [
        "Aberto",
        "Em andamento",
        "Resolvido"
    ];

    if (
        isset($chamados[$posicao]) &&
        in_array($novoStatus, $statusPermitidos)
    ) {
        // ATUALIZAR O STATUS
        $chamados[$posicao]["status"] = $novoStatus;

        // SALVAR OS DADOS
        salvarChamados($chamados);

        return true;
    }

    return false;
}

function excluirChamado($posicao) {

    // CONSULTAR OS CHAMADOS EXISTENTES
    $chamados = consultarChamados();

    if (isset($chamados[$posicao])) {

        // EXCLUIR O CHAMADO
        unset($chamados[$posicao]);

        // REORGANIZAR AS POSIÇÕES DO ARRAY
        $chamados = array_values($chamados);

        // SALVAR OS DADOS
        salvarChamados($chamados);

        return true;
    }

    return false;
}

function gerarRelatorio() {

    // CONSULTAR OS CHAMADOS EXISTENTES
    $chamados = consultarChamados();

    // INICIALIZAR AS CONTAGENS
    $total = count($chamados);
    $abertos = 0;
    $andamento = 0;
    $resolvidos = 0;

    // PERCORRER TODOS OS CHAMADOS
    foreach ($chamados as $chamado) {

        if ($chamado["status"] == "Aberto") {
            $abertos++;
        }

        if ($chamado["status"] == "Em andamento") {
            $andamento++;
        }

        if ($chamado["status"] == "Resolvido") {
            $resolvidos++;
        }
    }

    // RETORNAR OS RESULTADOS
    return [
        "total" => $total,
        "abertos" => $abertos,
        "andamento" => $andamento,
        "resolvidos" => $resolvidos
    ];
}

?>