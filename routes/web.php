
<?php

require_once __DIR__ . '/../app/Http/Controllers/helpdeskController.php';
require_once __DIR__ . '/../app/Http/Controllers/PortfolioController.php';

return [
    'GET' => [
        'portfolio' => [new PortfolioController(), 'index'],
        'helpdesk' => [new HelpdeskController(), 'index'],
        'poo' => [new PortfolioController(), 'poo'],
        'poo2' => [new PortfolioController(), 'poo2'],
    ],

    'POST' => [
        'helpdesk' => [new HelpdeskController(), 'salvar'],
    ],
];
