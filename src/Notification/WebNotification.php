<?php 

declare(strict_types = 1);

namespace App\Notification;

class WebNotification
{
    public static function adicionar(string $mensagem, string $tipo) : void
    {
        $_SESSION[$tipo] = $mensagem;
    }

    public static function show() : void
    { 
        if(isset($_SESSION['success'])){
            $tipo = 'success';
            $mensagem = $_SESSION['success'];
            include dirname(__DIR__) . "../../views/template/notification.phtml";
            unset($_SESSION['success']);
        }
        
        if(isset($_SESSION['danger'])){
            $tipo = 'danger';
            $mensagem = $_SESSION['danger'];
            include dirname(__DIR__) . "../../views/template/notification.phtml";
            unset($_SESSION['danger']);
        }
    }
}