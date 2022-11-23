<?php

declare(strict_types = 1);

namespace App\Controller;

abstract class AbstractController
{
    public function renderizar(string $nomeDoArquivo, ?array $dados = null) : void
    {
        include_once dirname(__DIR__) . "../../views/template/head.phtml";
        include_once dirname(__DIR__) . "../../views/template/navbar.phtml";
        include_once dirname(__DIR__) . "../../views/{$nomeDoArquivo}.phtml";
        $dados;
        include_once dirname(__DIR__) . "../../views/template/foot.phtml";
    }
}