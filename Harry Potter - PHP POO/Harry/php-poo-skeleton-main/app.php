<?php

declare(strict_types=1);

require_once '../php-poo-skeleton-main/src/Model/Arma.php';
require_once '../php-poo-skeleton-main/src/Model/Heroi.php';
require_once '../php-poo-skeleton-main/src/Model/Monstro.php';
require_once '../php-poo-skeleton-main/src/Model/Batalha.php';

use App\Model\Arma;
use App\Model\Heroi;
use App\Model\Monstro;
use App\Model\Batalha;

$teia = new Arma("Teia", 50, "Impacto");
$flechas = new Arma("Flechas", 100, "Perfurante");
$shuriken = new Arma("Shuriken", 150, "Cortante");

$homemAranha = new Heroi("Homem Aranha", 1, $teia);
$arqueiroVerde = new Heroi("Arqueiro Verde", 1, $flechas);
$naruto = new Heroi("Naruto", 1, $shuriken);

echo "Heróis disponíveis:" . PHP_EOL;
echo $homemAranha->apresentar() . PHP_EOL;
echo $arqueiroVerde->apresentar() . PHP_EOL;
echo $naruto->apresentar() . PHP_EOL;

$entradaHeroi = readline("Escolha o herói: ");
switch ($entradaHeroi) {
    case "Homem Aranha":
        $heroi = $homemAranha;
        break;
    case "Arqueiro Verde":
        $heroi = $arqueiroVerde;
        break;
    case "Naruto":
        $heroi = $naruto;
        break;
    default:
        echo "Herói não encontrado." . PHP_EOL;
        exit;
}

echo "Você escolheu: " . $heroi->apresentar() . PHP_EOL . PHP_EOL;

$monstros = [
        new Monstro("Gosma Verde", 150 + rand(10, 70), "Mole", 1),
        new Monstro("Golem de Pedra", 250 + rand(10, 200), "Forte", 1),
        new Monstro("Zumbi", 200 + rand(10, 100), "Normal", 1),
    ];

while ($heroi->nivel < 30) {
    
    $monstro = $monstros[array_rand($monstros)];

    echo "Monstro apareceu: " . $monstro->apresentarMonstro() . PHP_EOL;

    $batalha = new Batalha($heroi, $monstro);

    while ($monstro->vidaMonstro > 0) {
        $acao = readline("Ação: 1 - Atacar | 2 - Desistir: ");
        if ($acao == "1") {
             $batalha->atacarMonstro();
            $batalha->atacar();

            if ($heroi->vidaHeroi <= 0) {
                echo "{$heroi->nome} foi derrotado!" . PHP_EOL;
                exit;
            }
        } elseif ($acao == "2") {
            $batalha->desistir();
            exit;
        } else {
            echo "Ação inválida!" . PHP_EOL;
        }
    }

    $heroi->resetarVida();

    foreach ($monstros as $monstro) {
        $monstro->aumentarNivel();
    }

    echo "Vida do herói restaurada para {$heroi->vidaHeroi}!" . PHP_EOL;

    echo "---------- Próxima Batalha! ----------" . PHP_EOL . PHP_EOL;
}

echo "Parabéns! {$heroi->nome} derrotou todos os monstros e trouxe a paz!" . PHP_EOL;
?>


