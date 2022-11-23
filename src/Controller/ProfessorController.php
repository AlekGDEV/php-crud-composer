<?php

declare(strict_types = 1);

namespace App\Controller;

class ProfessorController extends AbstractController
{
    public function listar() : void
    {
        $this->renderizar('professor/listar');
    }

    public function novo() : void
    {
        $this->renderizar('professor/novo');
    }

    public function editar() : void
    {
        $this->renderizar('professor/editar');
    }

    public function excluir() : void
    {
        $this->renderizar('professor/excluir');
    } 
}