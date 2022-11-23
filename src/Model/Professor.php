<?php 

declare(strict_types = 1);

namespace App\Controller;

class Professor extends Pessoa
{
    public array $endereco = [];
    public ?string $formacao = null;
    public bool $status;
    public array $horariosDisponiveis = [];
}

