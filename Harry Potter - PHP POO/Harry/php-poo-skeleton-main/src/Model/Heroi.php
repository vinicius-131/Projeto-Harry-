<?php

namespace App\Model;
class Heroi {
    public string $nome;
    public int $nivel;
    public Arma $arma;
    public int $vidaHeroi;
        public function __construct($nome, $nivel, Arma $arma) {
        $this->nome = $nome;
        $this->nivel = $nivel;
        $this->arma = $arma;
        $this->vidaHeroi = 100 + ($nivel * 2);
    }

    public function resetarVida() {
        $this->vidaHeroi = 100 + ($this->nivel * 2);
    }
    public function apresentar() {
        return "Nome: {$this->nome}, Poder: {$this->nivel}, Arma: {$this->arma->nomeArma}";
    }
}
