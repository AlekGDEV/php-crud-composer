<?php

declare(strict_types = 1);

namespace App\Controller;

use App\Notification\WebNotification;
use App\Repository\UsuarioRepository;
use App\Security\UsuarioSecurity;

class AuthController extends AbstractController
{
    private UsuarioRepository $usuarioRepository;
    public function __construct()
    {
        $this->usuarioRepository = new UsuarioRepository;
    }

    public function login() : void
    {
        if(false === empty($_POST)){
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $usuario = $this->usuarioRepository->buscarUmPeloEmail($email);
            
            if(!$usuario){
                WebNotification::adicionar('Email não existe', 'danger');
                $this->redirecionar('login');
                return;
            }
            
            if(!password_verify($senha, $usuario->senha)){
                WebNotification::adicionar('Senha invalida', 'danger');
                $this->redirecionar('login');
                return;
            }
            
            UsuarioSecurity::seConectar($usuario);
            $this->redirecionar("");
            return;

        }


        $this->renderizar('auth/login', [], false);
        // $this->render('auth/login', navbar: false); APENAS A PARTIR DO PHP8
    }

    public function logout() : void
    {
        UsuarioSecurity::desconectar();
        $this->redirecionar('login');
    }
} 