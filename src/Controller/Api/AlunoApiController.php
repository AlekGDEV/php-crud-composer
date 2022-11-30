<?php

declare(strict_types = 1);

namespace App\Controller\Api;

use App\Repository\AlunoRepository;

class AlunoApiController
{
    private AlunoRepository $alunoRepository;

    public function capturarTodosAlunos() : void
    {
        $this->alunoRepository = new AlunoRepository();
        $alunos = $this->alunoRepository->buscarTodos();
        echo json_encode($alunos, JSON_PRETTY_PRINT);
    }
}