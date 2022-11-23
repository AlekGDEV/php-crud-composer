<?php 

declare(strict_types = 1);

namespace App\Controller;

abstract class Pessoa 
{
    public string $nome;
    public string $cpf;
}

$p = new Pessoa();
$p->nome = 'Joaquim';

echo "Oi $p->nome";