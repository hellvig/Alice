<?php

    // informar que a resposta será em JSON
    header('Content-Type: application/json; charset=utf-8');

    // Descobrir o método utilizado na requisição
    $metodo = $_SERVER['REQUEST_METHOD'];   

    // Lista de chamados de exemplo
    $chamados = [
        [
            "id" => 1,
            "titulo" => "Computador sem internet"
        ],
        [
            "id" => 2,
            "titulo" => "Impressora atolada"
        ]
    ];

    // Verificar o método da requisição, e executar X ações.
    // SE GET:
    if ($metodo === 'GET') {

        // Define o código de status HTTP dessa requisição
        http_response_code(200);

        // Por que não preciso utilizar JSON_PRETTY_PRINT?
        // Porque JSON_PRETTY_PRINT serve apenas para formatar o JSON,
        // deixando-o mais legível para humanos. Sem ele, o JSON continua
        // válido e pode ser interpretado normalmente pela aplicação cliente.
        echo json_encode($chamados, JSON_UNESCAPED_UNICODE);

        exit;

    }

    // SE POST:
    if ($metodo === 'POST') {
        // lê o conteúdo enviado no BODY na REQUISIÇÃO
        // php://input permite ler o corpo bruto da requisição.
        $conteudo = file_get_contents('php://input');

        // Converte JSON em ARRAY PHP
        $dados = json_decode($conteudo, true);

        // Verifica se os dados são válidos
            if (
            !is_array($dados) || // O JSON não foi convertido em um array
            !isset($dados['titulo']) || // O título não foi informado ou é nulo
            !is_string($dados['titulo'] || // O título não é m texto
            trim($dados['titulo']) === '') // O título está vazio ou contém apenas espaços
        ) {
            http_response_code(400);
            echo json_encode(["erro" => "Título obrigatório"]);
        }
    
        // Simula a criação de um chamado novo
        $novoChamado = [
            "id" => 3,
            "titulo" => trim($dados['titulo'])
        ];

        http_response_code(201);

        echo json_encode($novoChamado, JSON_UNESCAPED_UNICODE);

        exit;
    }

    header('allow: GET, POST');
    http_response_code(405);

    // COMANDOS NA VPS PARA TESTAR:
    // curl -i -X GET https://look.devlook.xyz/projetos/api/api-teste.php
    // curl -i -X POST https://look.devlook.xyz/projetos/api/api-teste.php \ -H 
    // "Content-Type: application/json" \ -d '{"titulo":"Impressora com defeito"}'
    // curl -i -X POST https://look.devlook.xyz/projetos/api/api-teste.php \ -H 
    // "Content-Type: application/json" \ -d


?>