<?php
require_once __DIR__.'/../../core/database/QueryBuilder.php';
require_once __DIR__.'/../entity/Usuarios.php';
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