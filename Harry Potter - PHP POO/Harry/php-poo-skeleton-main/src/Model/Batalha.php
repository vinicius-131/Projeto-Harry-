<?php

namespace App\Model;
// Criar Classe Arma

class Batalha {
    public Heroi $heroi;
    public Monstro $monstro;
    public int $turno = 1;

    public function __construct(Heroi $heroi, Monstro $monstro) {
        $this->heroi = $heroi;
        $this->monstro = $monstro;
    }

    public function atacar() {
        $dano = $this->heroi->arma->danoArma;
        $this->monstro->vidaMonstro -= $dano;


        echo "Turno {$this->turno}:" . PHP_EOL;
        echo "{$this->heroi->nome} ataca com {$this->heroi->arma->nomeArma} e causa {$dano} de dano!" . PHP_EOL;
        echo "Vida restante do monstro {$this->monstro->nomeMonstro}: {$this->monstro->vidaMonstro}" . PHP_EOL . PHP_EOL;
        echo "Vida restante do herói {$this->heroi->nome}: {$this->heroi->vidaHeroi}" . PHP_EOL . PHP_EOL;

        $this->turno++;

        if ($this->monstro->vidaMonstro <= 0) {
            echo "O monstro {$this->monstro->nomeMonstro} foi derrotado!" . PHP_EOL;
            $this->heroi->nivel++;
            $this->heroi->arma->danoArma += 20;
            echo "{$this->heroi->nome} subiu para o nível {$this->heroi->nivel}! e o dano da arma foi aumentado para {$this->heroi->arma->danoArma}!" . PHP_EOL;
        }
    }

    public function atacarMonstro() {
        $dano = intval($this->monstro->vidaMonstro / 10);
        $this->heroi->vidaHeroi -= $dano;
        echo "O monstro {$this->monstro->nomeMonstro} ataca e causa {$dano} de dano!" . PHP_EOL;
    }

    public function desistir() {
        echo "{$this->heroi->nome} desistiu da batalha!" . PHP_EOL;
    }
}