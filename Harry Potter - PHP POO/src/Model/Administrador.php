<?php

declare(strict_types=1);

namespace App\Model;

class Administrador {
    public string $nome;
    public string $emailAdmin;

    public function __construct($nome, $emailAdmin) {
        $this->nome = $nome;
        $this->emailAdmin = $emailAdmin;
    }
}
