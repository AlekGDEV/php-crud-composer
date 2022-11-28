<?php

declare(strict_types = 1);

namespace App\Controller;

use App\Repository\UsuarioRepository;

class AuthController extends AbstractController
{
    public function __construct()
    {
        $this->usuarioRepository = new UsuarioRepository;
    }

    public function login() : void
    {
        $this->renderizar('auth/login', [], false);
        // $this->render('auth/login', navbar: false); APENAS A PARTIR DO PHP8
    }

    public function logout() : void
    {

    }
}