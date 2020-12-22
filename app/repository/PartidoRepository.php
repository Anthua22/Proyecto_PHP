<?php

namespace FUTAPP\app\repository;

use FUTAPP\app\entity\Equipo;
use FUTAPP\app\entity\Partido;
use FUTAPP\app\entity\Usuarios;
use FUTAPP\core\database\QueryBuilder;
use PDO;


class PartidoRepository extends QueryBuilder
{
    public function __construct()
    {
        parent::__construct('partidos',Partido::class);
    }

    public function getAllPartidosArbitro(string $id)
    {
        $sql = "select * from partidos where arbitro = ".$id;
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute();
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, Partido::class);

    }

    public function getPartidosUnEquipo(int $id):array
    {
        $sql = 'select * from partidos where equipoLocal = '.$id.' or equipoVisitante = '.$id;
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute();

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, Partido::class);
    }

    public function getEquipoLocal(Partido $partido):?Equipo{
        $equipoRepository = new EquiposRepository();
        return $equipoRepository->find($partido->getEquipoLocal());
    }

    public function getEquipoVisitante(Partido $partido):?Equipo{
        $equipoRepository = new EquiposRepository();
        return $equipoRepository->find($partido->getEquipoVisitante());
    }

    public function getArbitro(Partido $partido):?Usuarios{
        $usuariosRepository = new UsuariosRepository();
        return $usuariosRepository->find($partido->getArbitro());
    }

    public function getPartidosArbitro(int $id):array{
        $sql = 'select * from partidos where arbitro = '.$id;
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute();

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, Partido::class);
    }

    public function getPartidosAsc(int $id):array{
        $sql = 'select * from partidos where arbitro = '.$id.' order by fecha_encuentro asc;';
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute();

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, Partido::class);
    }

    public function getPartidosDesc(int $id):array{
        $sql = 'select * from partidos where arbitro = '.$id.' order by fecha_encuentro desc;';
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute();

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, Partido::class);
    }
}