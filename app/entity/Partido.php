<?php
require_once __DIR__.'/../../core/database/IEntity.php';

class Partido implements IEntity
{
    private int $idPartido;
    private string $direccion_encuentro;
    private $fecha_encuentro;
    private int $idUsuario;
    private int $idEquipoLocal;
    private int $idEquipoVisitante;

    /**
     * @return int
     */
    public function getIdPartido(): int
    {
        return $this->idPartido;
    }

    /**
     * @param int $idPartido
     */
    public function setIdPartido(int $idPartido): void
    {
        $this->idPartido = $idPartido;
    }

    /**
     * @return string
     */
    public function getDireccionEncuentro(): string
    {
        return $this->direccion_encuentro;
    }

    /**
     * @param string $direccion_encuentro
     */
    public function setDireccionEncuentro(string $direccion_encuentro): void
    {
        $this->direccion_encuentro = $direccion_encuentro;
    }

    /**
     * @return mixed
     */
    public function getFechaEncuentro()
    {
        return $this->fecha_encuentro;
    }

    /**
     * @param mixed $fecha_encuentro
     */
    public function setFechaEncuentro($fecha_encuentro): void
    {
        $this->fecha_encuentro = $fecha_encuentro;
    }

    /**
     * @return int
     */
    public function getIdUsuario(): int
    {
        return $this->idUsuario;
    }

    /**
     * @param int $idUsuario
     */
    public function setIdUsuario(int $idUsuario): void
    {
        $this->idUsuario = $idUsuario;
    }

    /**
     * @return int
     */
    public function getIdEquipoLocal(): int
    {
        return $this->idEquipoLocal;
    }

    /**
     * @param int $idEquipoLocal
     */
    public function setIdEquipoLocal(int $idEquipoLocal): void
    {
        $this->idEquipoLocal = $idEquipoLocal;
    }

    /**
     * @return int
     */
    public function getIdEquipoVisitante(): int
    {
        return $this->idEquipoVisitante;
    }

    /**
     * @param int $idEquipoVisitante
     */
    public function setIdEquipoVisitante(int $idEquipoVisitante): void
    {
        $this->idEquipoVisitante = $idEquipoVisitante;
    }



    public function getId(): int
    {
        return $this->idPartido;
    }

    public function toArray(): array
    {
        return [
            'direccion_encuentro'=>$this->getDireccionEncuentro(),
            'fecha_encuentro'=>$this->getFechaEncuentro(),
            'idUsuario'=>$this->getIdUsuario(),
            'idEquipoLocal'=>$this->getIdEquipoLocal(),
            'idEquipoVisitante'=>$this->getIdEquipoVisitante()
        ];
    }
}