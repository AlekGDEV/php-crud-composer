<?php 

declare(strict_types = 1);

namespace App\Controller;

use DateTime; // importando a classe interna do PHP DateTime

//Aqui vai ficar a definição do caminho até essa classe

class Aluno extends Pessoa
{
    public string $matricula;
    public string $email;
    public bool $status;
    public string $genero;
    public DateTime $dataNascimento;
    protected string $cpf;
}