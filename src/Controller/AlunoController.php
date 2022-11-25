<?php

declare(strict_types = 1);

namespace App\Controller;

use App\Model\Aluno;
use App\Repository\AlunoRepository;
use Dompdf\Dompdf;
use Exception;

class AlunoController extends AbstractController
{
    public function listar() : void
    {
        $rep = new AlunoRepository;
        $this->renderizar('aluno/listar', [
            'alunos' => $rep->buscarTodos()
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
        
        $rep = new AlunoRepository();
        try{
            $rep->inserir($aluno);
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
        if(empty($_POST)){
            $id = $_GET['id'];
            $rep = new AlunoRepository();
            $aluno = $rep->buscarUm($id);
            $this->renderizar('aluno/editar', [$aluno]);
        }

        $aluno->nome = $_POST['nome'];
        $aluno->cpf = $_POST['cpf'];
        $aluno->email = $_POST['email'];
        $aluno->genero = $_POST['genero'];
        $aluno->dataNascimento = $_POST['dataNascimento'];

        $rep = new AlunoRepository();
        try{
            $rep->atualizar($aluno, $id);
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

    public function excluir() : void
    {
        $id = $_GET['id'];
        $rep = new AlunoRepository();
        $rep->excluir($id);
        
        $this->redirecionar('alunos/listar');
    }
    
    public function relatorio() : void
    {
        $hoje = date('d/m/Y, H:i:s');
        $design = "
            <h1>Relatorio de alunos</h1>
            <hr>
            <em>Gerado em {$hoje}</em>
        ";

        $dompdf = new Dompdf();

        $dompdf->setPaper('A4', 'portrait');
        $dompdf->loadHtml($design);
        $dompdf->render();
        $dompdf->stream();
    }
}