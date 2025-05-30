<?php

declare(strict_types=1);


require_once  '../Harry Potter - PHP POO/src/Model/Aluno.php';
require_once  '../Harry Potter - PHP POO/src/Model/Administrador.php';
require_once  '../Harry Potter - PHP POO/src/Model/Hogwarts.php';

use App\Model\Administrador;
use App\Model\Aluno;
use App\Model\Hogwarts;

$dumbledore = new Administrador('Alvo Dumbledore', 'alvo.dumbledore@gmail.com');
$harry = new Aluno('Harry Potter', 'harry.potter@gmail.com', '17');
$ronald = new Aluno('Ronald Weasley', 'ron.weasley@gmail.com', '19');
$hermione = new Aluno('Hermione Granger', 'hermione123@gmail.com', '22');
$draco = new Aluno('Draco Malfoy', 'draco_malf34@gmail.com', '14');
$alunos = [$harry, $ronald, $hermione, $draco];

function verificarAluno(array $alunos): array {
    $alunosAceitos = [];

    foreach ($alunos as $aluno) {
        if ((int)$aluno->idade >= 18) {
            $alunosAceitos[] = $aluno;
        }
    }

    return $alunosAceitos;
}

function enviarEmail(array $alunosAceitos, Administrador $administrador, string $resposta) {
    foreach ($alunosAceitos as $aluno) {
        echo "Enviando email para {$aluno->nome} ({$aluno->emailAluno}) informando que foi aceito na escola. {$administrador->nome} pergunta: você aceita entrar na nossa escola?\n";
    }

    if (strtolower($resposta) === 'sim') {
        echo "Os alunos aceitaram a proposta.\n";
        return true;
    } else {
        echo "Nem todos os alunos aceitaram.\n";
        return false;
    }
}

$alunosAceitos = verificarAluno($alunos);

echo "Os alunos que foram aceitos na escola são:\n\n";

foreach ($alunosAceitos as $aluno) {
    echo "- {$aluno->nome} ({$aluno->idade} anos)\n";
}

echo "\n";

$resposta = 'sim';


enviarEmail($alunosAceitos, $dumbledore, $resposta);
