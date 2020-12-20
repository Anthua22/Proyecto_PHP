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

    public function checkAccount(Usuarios $usuaricheck):bool{
        $usuariosRepository = new UsuariosRepository();

        $usuarios = $usuariosRepository->findAll();
        $existe = false;

        foreach ($usuarios as $usuario){
            if($usuario->getEmail()===$usuaricheck->getEmail()){
                $existe = true;
            }
        }

        return $existe;
    }

    public function updateInfo(Usuarios  $usuarios){

        $parametros = $usuarios->toArrayInfo();

        $campos = '';
        foreach ($parametros as $nombre => $valor)
            $campos .= "$nombre=:$nombre, ";
        $campos = rtrim($campos, ', ');

        $sql = sprintf(
            "UPDATE %s set %s WHERE id = %s;",
            $this->getTable(),
            $campos,
            $usuarios->getId()
        );
        $pdoStatement = $this->getConnection()->prepare($sql);
        return $pdoStatement->execute($parametros);
    }

    public function updatePass(Usuarios $usuarios){
        $sql = "UPDATE ".$this->getTable()." set password = '".$usuarios->getPassword()."' where id = ".$usuarios->getId().';';

        $pdostatement = $this->getConnection()->prepare($sql);
        return $pdostatement->execute();
    }

    public function getAllArbitros()
    {
        $sql = "select * from ".$this->getTable()." where role='arbitro';";
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute();
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, $this->getEntityClass());
    }

    public function getAllAdmins(){
        $sql = "select * from ".$this->getTable()." where role='admin';";
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute();
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, $this->getEntityClass());
    }

}