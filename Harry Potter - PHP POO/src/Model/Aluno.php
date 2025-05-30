<?php

declare(strict_types=1);

namespace App\Model;
class Aluno {
    public string $nome;
    public string $idade;
    public string $emailAluno;

    public function __construct($nome, $emailAluno, $idade) {
        $this->nome = $nome;
        $this->emailAluno = $emailAluno;
        $this->idade = $idade;
    }
}