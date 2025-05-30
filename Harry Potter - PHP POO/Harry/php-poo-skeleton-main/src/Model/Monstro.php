<?php

namespace App\Model;
class Monstro {
    public string $nomeMonstro;
    public int $vidaMonstro;
    public string $tipoMonstro;

    public int $nivelMonstro;

    public function __construct($nomeMonstro, $vidaMonstro, $tipoMonstro, $nivelMonstro) {
        $this->nomeMonstro = $nomeMonstro;
        $this->vidaMonstro = $vidaMonstro;
        $this->tipoMonstro = $tipoMonstro;
        $this->nivelMonstro = $nivelMonstro;
    }

    public function apresentarMonstro() {
        return "Nome do Monstro: {$this->nomeMonstro}, Vida: {$this->vidaMonstro}, Tipo: {$this->tipoMonstro}, Nivel: {$this->nivelMonstro}";

    }

    

    public function aumentarNivel() {
        $this->nivelMonstro += 1;
    }
}
