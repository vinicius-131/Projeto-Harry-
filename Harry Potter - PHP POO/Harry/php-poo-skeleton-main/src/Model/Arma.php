<?php
namespace App\Model;
// Criar Classe Arma
class Arma {
    public string $nomeArma;
    public int $danoArma;
    public string $tipoArma;

    public function __construct($nomeArma, $danoArma, $tipoArma) {
        $this->nomeArma = $nomeArma;
        $this->danoArma = $danoArma;
        $this->tipoArma = $tipoArma;
    }

    public function apresentarArma() {
        return "Nome da Arma: {$this->nomeArma}, Dano: {$this->danoArma}, Tipo: {$this->tipoArma}";
    }
}
