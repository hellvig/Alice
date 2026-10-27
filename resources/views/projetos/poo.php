<?php

// ENCAPSULAMENTO
//Proteger informações para que não sejam alteradas de qualquer jeito.

//HERANÇA
//Criar uma classe nova aproveitando características de outra.

//POLIMORFISMO
//Permitir que objetos diferentes respondam à mesma ação de maneiras diferentes.

//ABSTRAÇÃO
//Mostrar o que é necessário e esconder detalhes complicados de funcionamento.

class Personagem {
    public $nome;
    private $vida;
    public $dano;

    public function __construct($nome, $vida, $dano) {
        $this->nome = $nome;
        $this->vida = $vida;
        $this->dano = $dano;
    }

    //GETTER
    public function getVida() {
        return $this->vida;
    }

    //SETTER
    public function setVida($vida) {
        if ($vida < 0) {
            $this->vida = 0;
            echo "A vida não pode ser negativa!\n";
            return;
        }

        $this->vida = $vida;
    }
        
    public function atacar() {
        echo "$this->nome realizou um ataque!";
    }
}

$alice = new Personagem("Alice", 100, 10);

$alice->setvida(50);

$kler = new Personagem("kler", 160, 15);
$ana = new Personagem("Ana", 50, 99);

$alice->atacar(); // método herdado

class Guerreiro extends Personagem {
    public function defender() {
        echo "$this->nome levantou o escudo!";
    }
}

$guerreiro = new Guerreiro("Alice", 100, 10);

$guerreiro->atacar(); //método herdado
$guerreiro->defender(); //método próprio

//1. O que é uma classe?
//Um molde para criar objetos

//2. O que significa new Personagem()?
//Criar um objeto da classe Personagem

//3. Para que serve $this->nome?
//Acessar o nome do objeto atual

//4. O que significa extends?
//Herdar características e métodos de outra classe
?>