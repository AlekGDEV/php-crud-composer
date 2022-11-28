<?php 

declare(strict_types = 1);

namespace App\Repository;

use App\Connection\DatabaseConnection;
use App\Model\Categoria;
use App\Model\Curso;
use PDO;

class CursoRepository
{

    public const TABLE = 'tb_cursos';
    public PDO $conexao;

    public function __construct()
    {
        $this->conexao = DatabaseConnection::abrirConexao();
    }

    public function buscarTodos(): iterable
    {
        $sql = "SELECT * FROM " . self::TABLE . " INNER JOIN tb_categorias ON tb_cursos.categoria_id = tb_categorias.id";

        $query = $this->conexao->query($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_CLASS, Curso::class);
    }
}