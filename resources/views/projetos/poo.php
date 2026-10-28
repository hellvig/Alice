<?php

// ENCAPSULAMENTO
//Proteger informações para que não sejam alteradas de qualquer jeito.

//HERANÇA
//Criar uma classe nova aproveitando características de outra.

//POLIMORFISMO
//Permitir que objetos diferentes respondam à mesma ação de maneiras diferentes.

//ABSTRAÇÃO
//Mostrar o que é necessário e esconder detalhes complicados de funcionamento.

abstract class Personagem {

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
    
    //Toda classe filha deverá implementar atacar()
    abstract public function atacar();
}

class Guerreiro extends Personagem {
    //Sobreescrevendo o método da classe pai
    public function atacar() {
        echo "$this->nome Atacou com uma espada!\n";
    }

    public function defender() {
        echo "$this->nome levantou o escudo!";
    }

}

class Mago extends Personagem {
        // Sobreescrevendo o método de classe pai
    public function atacar() {
        echo "$this->nome lançou uma bola de fogo!\n";
    }
}

class Curandeiro extends Personagem {
    
    public function atacar() {
        echo "$this->nome atacou com uma faca!\n";
    }

    public function curar(Personagem $alvo, int $quantidade) {
        $novaVida = $alvo->getVida() + $quantidade;
        $alvo->setVida($novaVida);
        echo "this->nome curou {$alvo->nome} em $quantidade HP!\n";
    }
}

$guerreiro = new Guerreiro("Alice", 100, 10);
$mago = new Mago("Ana", 50, 99);
$personagem = new Personagem("kler", 160, 15);

$personagens = [$guerreiro, $mago, $personagem];

foreach($personagens as $p) {
    $p->atacar();
}

$curandeiro->curar($guerreiro, 50);

//1. O que é uma classe?
//Um molde para criar objetos

//2. O que significa new Personagem()?
//Criar um objeto da classe Personagem

//3. Para que serve $this->nome?
//Acessar o nome do objeto atual

//4. O que significa extends?
//Herdar características e métodos de outra classe
?>