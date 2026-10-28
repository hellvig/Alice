<?php

class Chamado
{
    private function caminhoArquivo()
    {
        return __DIR__ . "/../../storage/data/chamados.json";
    }

    public function lerChamados()
    {
        $arquivo = $this->caminhoArquivo();

        if (!file_exists($arquivo)) {
            $pasta = dirname($arquivo);

            if (!is_dir($pasta)) {
                mkdir($pasta, 0775, true);
            }

            file_put_contents($arquivo, "[]");
        }

        $conteudo = file_get_contents($arquivo);
        $chamados = json_decode($conteudo, true);

        return is_array($chamados) ? $chamados : [];
    }

    public function salvarChamados($chamados)
    {
        $arquivo = $this->caminhoArquivo();

        $json = json_encode(
            array_values($chamados),
            JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
        );

        return file_put_contents($arquivo, $json, LOCK_EX) !== false;
    }

    public function cadastrarChamados(
        $nome,
        $setor,
        $equipamento,
        $descricao,
        $prioridade
    ) {
        if (
            trim($nome) === "" ||
            trim($descricao) === ""
        ) {
            return false;
        }

        $chamados = $this->lerChamados();

        $chamados[] = [
            "nome" => trim($nome),
            "setor" => $setor,
            "equipamento" => $equipamento,
            "descricao" => trim($descricao),
            "prioridade" => $prioridade,
            "status" => "Aberto"
        ];

        return $this->salvarChamados($chamados);
    }

    public function atualizarChamado($posicao, $novoStatus)
    {
        $chamados = $this->lerChamados();

        $statusPermitidos = [
            "Aberto",
            "Em andamento",
            "Resolvido"
        ];

        if (
            !isset($chamados[$posicao]) ||
            !in_array($novoStatus, $statusPermitidos, true)
        ) {
            return false;
        }

        $chamados[$posicao]["status"] = $novoStatus;

        return $this->salvarChamados($chamados);
    }

    public function excluirChamados($posicao)
    {
        $chamados = $this->lerChamados();

        if (!isset($chamados[$posicao])) {
            return false;
        }

        unset($chamados[$posicao]);

        return $this->salvarChamados($chamados);
    }

    public function gerarRelatorios()
    {
        $chamados = $this->lerChamados();

        $relatorio = [
            "total" => count($chamados),
            "abertos" => 0,
            "em_andamento" => 0,
            "resolvidos" => 0
        ];

        foreach ($chamados as $chamado) {
            if (($chamado["status"] ?? "") === "Aberto") {
                $relatorio["abertos"]++;
            } elseif (($chamado["status"] ?? "") === "Em andamento") {
                $relatorio["em_andamento"]++;
            } elseif (($chamado["status"] ?? "") === "Resolvido") {
                $relatorio["resolvidos"]++;
            }
        }

        return $relatorio;
    }
}