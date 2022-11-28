<?php

declare(strict_types = 1);

namespace App\Controller;

use App\Repository\CursoRepository;

class CursoController extends AbstractController
{
    private CursoRepository $repository;
    public function __construct()
    {
        $this->repository = new CursoRepository;
    }
    public function listar() : void
    {
        $this->renderizar('curso/listar', [
            'cursos' => $this->repository->buscarTodos()
        ]);
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