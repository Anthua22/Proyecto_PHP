<?php
namespace FUTAPP\app\repository;
use FUTAPP\app\entity\Usuarios;
use FUTAPP\core\database\QueryBuilder;
use PDO;

class UsuariosRepository extends QueryBuilder
{


    /**
     * UsuariosRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'usuarios',Usuarios::class
        );


    }

    public function getAllArbitros()
    {
        $sql = "select * from ".$this->getTable()." where role='arbitro';";
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute();
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, $this->getEntityClass());
    }

}