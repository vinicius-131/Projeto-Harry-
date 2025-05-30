<?php

declare(strict_types=1);

namespace App\Model;
class Hogwarts {
    public string $nomeEscola;
    public string $localizacao;
    public array $alunosAceitos;
    public Administrador $administrador;

    public function __construct($nomeEscola, $localizacao, $alunos, $administrador) {
        $this->nomeEscola = $nomeEscola;
        $this->localizacao = $localizacao;
        $this->alunosAceitos = $alunos;
        $this->administrador = $administrador;
    }
}