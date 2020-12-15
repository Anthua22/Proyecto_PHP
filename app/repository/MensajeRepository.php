<?php


namespace FUTAPP\app\repository;


use FUTAPP\app\entity\Mensajes;
use FUTAPP\core\database\QueryBuilder;
use PDO;

class MensajeRepository extends QueryBuilder
{
    public function __construct()
    {
        parent::__construct('mensajes',Mensajes::class);
    }

    public function getAllMensajeUser(string $id){
        $sql = "select * from ".$this->getTable().' where receptor ='.$id.' or emisor = '.$id;

        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute();
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, $this->getEntityClass());
    }

    public function getAllReceptor(string $id){
        $sql = "select * from ".$this->getTable().' where receptor ='.$id;

        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute();
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, $this->getEntityClass());
    }

    public function getAllEmisor(string $id){
        $sql = "select * from ".$this->getTable().' where emisor ='.$id;

        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute();
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, $this->getEntityClass());
    }
}