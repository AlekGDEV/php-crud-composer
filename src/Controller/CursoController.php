<?php

declare(strict_types = 1);

namespace App\Controller;

class CursoController extends AbstractController
{
    public function listar() : void
    {
        $this->renderizar('curso/listar');
    }

    public function novo() : void
    {
        $this->renderizar('curso/novo');
    }

    public function editar() : void
    {
        $this->renderizar('curso/editar');
    }

    public function excluir() : void
    {
        $this->renderizar('curso/excluir');
    } 
}