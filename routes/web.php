<?php

require_once __DIR__ . '/../app/Http/Controllers/helpdeskController.php';
require_once __DIR__ . '/../app/Http/Controllers/PortfolioController.php';

return [
    'GET' => [
        'portfolio' => [new PortfolioController(), 'index'],
        'helpdesk' => [new HelpdeskController(), 'index'],
        'idade' => [new PortfolioController(), 'idade'],
        'notas' => [new PortfolioController(), 'notas'],
        'notas-desafio' => [new PortfolioController(), 'notasDesafio'],
        'login-basico' => [new PortfolioController(), 'loginBasico'],
        'jogos' => [new PortfolioController(), 'jogos'],
        'poo' => [new PortfolioController(), 'poo'],
        'poo2' => [new PortfolioController(), 'poo2'],
    ],

    'POST' => [
        'helpdesk' => [new HelpdeskController(), 'salvar'],
        'idade' => [new PortfolioController(), 'idade'],
        'notas' => [new PortfolioController(), 'notas'],
        'notas-desafio' => [new PortfolioController(), 'notasDesafio'],
        'login-basico' => [new PortfolioController(), 'loginBasico'],
        'jogos' => [new PortfolioController(), 'jogos'],
        'poo' => [new PortfolioController(), 'poo'],
        'poo2' => [new PortfolioController(), 'poo2'],
    ],
];
