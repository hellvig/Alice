<?php

// Exemplo SEM POO
$nome = "Alice";
$vida = 100;
$dano - 10;

$nome = "kler";
$vida = 160;
$dano - 15;

$nome = "velma";
$vida = 50;
$dano - 99;

function atacar($nome) {
    echo "$nome realizou um ataque!";
}

atacar($nome);


// Exemplo COM POO
class Personagem {
    public $nome;
    public $vida;
    public $dano;

    public function __construct($nome, $vida, $dano) {
        $this->nome = $nome;
        $this->vida = $vida;
        $this->dano = $dano;
    }
        
    public function atacar() {
        echo "$this->nome realizou um ataque!";
    }
}

$alice = new Personagem("Alice", 100, 10);
$kler = new Personagem("kler", 160, 15);
$velma = new Personagem("kler", 50, 99);


?>