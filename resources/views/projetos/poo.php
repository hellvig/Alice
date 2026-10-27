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
    public $vida = 100;
    public $dano = 10;

    public function atacar() {
        echo "$this->nome realizou um ataque!";
    }
}

$personagem1 = new Personagem();
$personagem1->nome = "Alice";
$personagem1->atacar();


?>