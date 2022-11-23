<?php

declare(strict_types = 1);

namespace App\Controller;

class AlunoController extends AbstractController
{
    public function listar() : void
    {
        $this->renderizar('aluno/listar');
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