<?php

declare(strict_types = 1);

namespace App\Controller;

use App\Repository\AlunoRepository;

class AlunoController extends AbstractController
{
    public function listar() : void
    {
        $rep = new AlunoRepository;
        $this->renderizar('aluno/listar', [
            'alunos' => $rep->buscarTodos()
        ]);
    }

    public function novo() : void
    {
        $this->renderizar('aluno/novo');
    }

    public function editar() : void
    {
        $this->renderizar('aluno/editar');
    }

    public function excluir() : void
    {
        $this->renderizar('aluno/excluir');
    } 
}