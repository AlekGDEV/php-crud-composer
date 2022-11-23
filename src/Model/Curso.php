<?php 

declare(strict_types = 1);

namespace App\Controller;

class Curso 
{
    public string $nome;
    public int $cargaHoraria;
    public string $descricao;
    public bool $status;
    public array $ementa;
}