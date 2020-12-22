<?php


namespace FUTAPP\app\repository;


use FUTAPP\app\entity\Mensajes;
use FUTAPP\app\entity\Partido;
use FUTAPP\core\App;
use FUTAPP\core\database\IEntity;
use FUTAPP\core\database\QueryBuilder;
use PDO;

class MensajeRepository extends QueryBuilder
{
    public function __construct()
    {
        parent::__construct('mensajes', Mensajes::class);
    }


    public function getAllMensajeUser(array $ids)
    {
        $sql = "select * from " . $this->getTable() . ' where ';

        $contador = 0;
        foreach ($ids as $id) {
            $contador++;
            if ($contador === 1) {
                $sql .= "receptor = " . $id->getEmisor();
            } else {
                $sql .= " or receptor = " . $id->getEmisor();
            }
        }


        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute();
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, $this->getEntityClass());
    }

    public function getMensajesUser(string $id)
    {
        $sql = "select * from mensajes where receptor = " . $id . " or emisor = " . $id;

        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute();
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, Mensajes::class);

    }


    public function getAllMensajeUserRecep(array $ids)
    {
        $sql = "select * from " . $this->getTable() . ' where ';

        $contador = 0;
        foreach ($ids as $id) {
            $contador++;
            if ($contador === 1) {
                $sql .= "receptor = " . $id->getEmisor() . '';
            } else {
                $sql .= " or receptor = " . $id->getEmisor();
            }
        }


        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute();
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, $this->getEntityClass());
    }

    public function find(string $id): ?IEntity
    {
        $sql = "select * from " . $this->getTable() . " where receptor = " . $id;
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute();
        $pdoStatement->setFetchMode(PDO::FETCH_CLASS, $this->getEntityClass());
        return $pdoStatement->fetch(PDO::FETCH_CLASS);

    }

    public function findAll(): array
    {
        $id = App::get('user')->getId();
        $sql = "select * from " . $this->getTable() . " where receptor = " . $id;
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute();

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, $this->getEntityClass());
    }

    public function getMensajes(Mensajes $id)
    {
        $user = App::get('user');
        $sql = "select * from " . $this->getTable() . ' where receptor = ' . $id->getEmisor() . ' and emisor =' . $id->getReceptor() . ' or receptor = ' . $id->getReceptor() . ' and emisor= ' . $id->getEmisor();

        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute();
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, Mensajes::class);
    }

    public function getMensajeReceptor()
    {
        $user = App::get('user');
        $sql = "select * from " . $this->getTable() . ' where receptor = ' . $user->getId() . ' or emisor =' . $user->getId();
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute();
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, Mensajes::class);
    }

    public function getEmisores(string $id)
    {
        $user = App::get('user');
        $sql = "select * from " . $this->getTable() . ' where receptor = ' . $user->getId() . ' or emisor =' . $id;

        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute();
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, Mensajes::class);
    }


    public function getMensajesReceptor(string $class)
    {
        $sql = "select distinct receptor from " . $this->getTable();

        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute();
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, $class);
    }

    public function getMensajeChat( array $mensajes)
    {
        $sql = "select * from " . $this->getTable() . ' where  ';
        foreach ($mensajes as $mensaje) {
            $sql.= " receptor = " . $mensaje->getReceptor() . ' and emisor = ' . $mensaje->getEmisor() . ' or receptor = ' . $mensaje->getEmisor() . ' and emisor =' . $mensaje->getReceptor().' or';
        }
        $sql = substr($sql,-2);
        $sql.=" order by hora asc";
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute();
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, $this->getEntityClass());
    }


}