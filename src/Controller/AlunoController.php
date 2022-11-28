<?php

declare(strict_types = 1);

namespace App\Controller;

use App\Model\Aluno;
use App\Repository\AlunoRepository;
use Dompdf\Dompdf;
use Exception;

class AlunoController extends AbstractController
{
    private AlunoRepository $repository;
    public function __construct()
    {
        $this->repository = new AlunoRepository;
    }

    public function listar() : void
    {
        $this->renderizar('aluno/listar', [
            'alunos' => $this->repository->buscarTodos()
        ]);
    }

    public function novo() : void
    {
        if(empty($_POST)){
            $this->renderizar('aluno/novo');
            return;
        }

        $aluno = new Aluno();
        $aluno->nome = $_POST['nome'];
        $aluno->cpf = $_POST['cpf'];
        $aluno->email = $_POST['email'];
        $aluno->genero = $_POST['genero'];
        $aluno->dataNascimento = $_POST['dataNascimento'];
        
        try{
            $this->repository->inserir($aluno);
        } catch(Exception $exception){
            if(str_contains($exception->getMessage(), 'cpf')){
                die('CPF já existe');
            }
            if(str_contains($exception->getMessage(), 'email')){
                die('Email já existe');
            }

            die('Vish, aconteceu um erro');
        }
        $this->redirecionar('alunos/listar');      
    }

    public function editar() : void
    {
        $id = $_GET['id'];
        $aluno = $this->repository->buscarUm($id);
        $this->renderizar('aluno/editar', [$aluno]);
        if(!empty($_POST)){
            $aluno->nome = $_POST['nome'];
            $aluno->cpf = $_POST['cpf'];
            $aluno->email = $_POST['email'];
            $aluno->genero = $_POST['genero'];
            $aluno->dataNascimento = $_POST['dataNascimento'];
            try{
                $this->repository->atualizar($aluno, $id);
            } catch(Exception $exception){
                if(str_contains($exception->getMessage(), 'cpf')){
                    die('CPF já existe');
                }
                if(str_contains($exception->getMessage(), 'email')){
                    die('Email já existe');
                }
    
                die('Vish, aconteceu um erro');
            }
            $this->redirecionar('alunos/listar');
        }
    }

    public function excluir() : void
    {
        $id = $_GET['id'];
        $this->repository->excluir($id);
        
        $this->redirecionar('alunos/listar');
    }
    
    public function relatorio() : void
    {
        date_default_timezone_set('America/Sao_Paulo');
        $hoje = date('d/m/Y, H:i:s');
        $alunos = $this->repository->buscarTodos();
        $design = "
            <h1>Relatorio de alunos</h1>
            <hr>
            <em>Gerado em {$hoje}</em>

            <table border='1'>
                <thead>
                    <th>ID</th>
                    <th>Nome</th>
                </thead>
                <tbody>"; 

        $dompdf = new Dompdf();

        $dompdf->setPaper('A4', 'portrait');
        $dompdf->loadHtml($design);
        $dompdf->render();
        $dompdf->stream('relatorio');
    }
}