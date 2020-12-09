<?php

require_once __DIR__.'/../App.php';
require_once 'IEntity.php';


abstract class QueryBuilder
{
    private PDO $connection;
    private string $table;
    private string $entityClass;

    /**
     * QueryBuilder constructor.
     * @param PDO $connection
     * @param string $table
     * @param string $entityClass
     */
    public function __construct(string $table, string $entityClass)
    {
        $this->connection = App::get('connection');
        $this->table = $table;
        $this->entityClass = $entityClass;
    }

    public function findAll() : array
    {
        $sql = "select * from $this->table;";
        $pdoStatement = $this->connection->prepare($sql);
        $pdoStatement->execute();

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, $this->entityClass);
    }

    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return $this->entityClass;
    }

    /**
     * @return string
     */
    public function getTable(): string
    {
        return $this->table;
    }

    public function find(int $id) : ?IEntity
    {
        $sql = "select * from $this->table where id=$id;";
        $pdoStatement = $this->connection->prepare($sql);
        $pdoStatement->execute();
        $pdoStatement->setFetchMode( PDO::FETCH_CLASS, $this->entityClass);
        return $pdoStatement->fetch(PDO::FETCH_CLASS);
    }

    public function save(IEntity $entidad) : bool
    {
        $parametros = $entidad->toArray();

        $campos = implode(', ', array_keys($parametros));
        $valores = ':' . implode(', :', array_keys($parametros));
        $sql = sprintf(
            "INSERT INTO %s (%s) VALUES (%s);",
            $this->table,
            $campos,
            $valores
        );
        $pdoStatement = $this->connection->prepare($sql);
        return $pdoStatement->execute($parametros);
    }

    public function update(IEntity $entidad) : bool
    {
        $parametros = $entidad->toArray();

        $campos = '';
        foreach ($parametros as $nombre => $valor)
            $campos .= "$nombre=:$nombre, ";
        $campos = rtrim($campos, ', ');

        $sql = sprintf(
            "UPDATE %s set %s WHERE id = %s;",
            $this->table,
            $campos,
            $entidad->getId()
        );
        $pdoStatement = $this->connection->prepare($sql);
        return $pdoStatement->execute($parametros);
    }

    public function delete(IEntity $entity) : bool
    {
        $sql = sprintf(
            "DELETE FROM %s WHERE id = :id;",
            $this->table
        );
        $pdoStatement = $this->connection->prepare($sql);

        $id = $entity->getId();
        $pdoStatement->bindParam('id', $id);
        return $pdoStatement->execute();
    }

    /**
     * @return PDO
     */
    public function getConnection()
    {
        return $this->connection;
    }

}