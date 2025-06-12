<?php

namespace App\Entity;

class Aluno {
    private string $nome;
    private string $casa;

    public function __construct(string $nome, string $casa) {
        $this->nome = $nome;
        $this->casa = $casa;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getCasa(): string {
        return $this->casa;
    }
}

///Registro diciplinar 

namespace App\Entity;

class RegistroDisciplinar {
    private Aluno $aluno;
    private string $motivo;
    private \DateTime $data;

    public function __construct(Aluno $aluno, string $motivo) {
        $this->aluno = $aluno;
        $this->motivo = $motivo;
        $this->data = new \DateTime();
    }

    public function resumo(): string {
        return $this->data->format('Y-m-d') . " | {$this->aluno->getNome()} ({$this->aluno->getCasa()}): {$this->motivo}";
    }
}

///Registro de repositorio

namespace App\Repository;

use App\Entity\RegistroDisciplinar;

class RegistroRepository {
    private array $registros = [];

    public function adicionar(RegistroDisciplinar $registro) {
        $this->registros[] = $registro;
    }

    public function listar(): array {
        return $this->registros;
    }
}

/// controle de aluno

namespace App\Controller;

use App\Entity\Aluno;
use App\Entity\RegistroDisciplinar;
use App\Repository\RegistroRepository;

class AlunoController {
    private RegistroRepository $repo;

    public function __construct() {
        $this->repo = new RegistroRepository();
    }

    public function registrarOcorrencia(Aluno $aluno, string $motivo) {
        $registro = new RegistroDisciplinar($aluno, $motivo);
        $this->repo->adicionar($registro);
    }

    public function listarOcorrencias() {
        foreach ($this->repo->listar() as $registro) {
            echo $registro->resumo() . PHP_EOL;
        }
    }
}


////////

require_once __DIR__ . '/../vendor/autoload.php';

use App\Entity\Aluno;
use App\Controller\AlunoController;

$controller = new AlunoController();

$harry = new Aluno("Harry Potter", "Grifinória");
$malfoy = new Aluno("Draco Malfoy", "Sonserina");

$controller->registrarOcorrencia($harry, "Usou feitiço fora da sala");
$controller->registrarOcorrencia($malfoy, "Atrapalhou aula de Poções");

$controller->listarOcorrencias();


