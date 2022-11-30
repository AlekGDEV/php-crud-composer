<?php

declare(strict_types = 1);

namespace App\Controller\Api;

use App\Repository\UsuarioRepository;

class UsuarioApiController
{
    private UsuarioRepository $usuarioRepository;

    public function capturarTodosUsuarios() : void
    {
        $this->usuarioRepository = new UsuarioRepository();
        $usuarios = $this->usuarioRepository->buscarTodos();
        echo json_encode($usuarios, JSON_PRETTY_PRINT);
    }
}