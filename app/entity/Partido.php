<?php
require_once __DIR__.'/../../core/database/IEntity.php';

class Partido implements IEntity
{
    private int $id;
    private string $direccion_encuentro;
    private $fecha_encuentro;
    private int $arbitro;
    private int $equipoLocal;
    private int $equipoVisitante;
    private string $resultado;



    /**
     * @return string
     */
    public function getFecha(): string
    {
        $fecha = explode(' ',$this->getFechaEncuentro());
        return $fecha[0];
    }

    /**
     * @return string
     */
    public function getHoraCompleta(): string
    {
        $fecha = explode(' ',$this->getFechaEncuentro());
        return $fecha[1];
    }

    /**
     * @return string
     */
    public function getHora(): string
    {
        return $this->hora;
    }
    private string $hora;

    /**
     * Partido constructor.
     */
    public function __construct()
    {
        $this->setResultado('0-0');
    }


    /**
     * @return string
     */
    public function getResultado(): string
    {
        return $this->resultado;
    }

    /**
     * @param string $resultado
     */
    public function setResultado(string $resultado): void
    {
        $this->resultado = $resultado;
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
    public function getArbitro(): int
    {
        return $this->arbitro;
    }

    /**
     * @param int $arbitro
     */
    public function setArbitro(int $arbitro): void
    {
        $this->arbitro = $arbitro;
    }

    /**
     * @return int
     */
    public function getEquipoLocal(): int
    {
        return $this->equipoLocal;
    }

    /**
     * @param int $equipoLocal
     */
    public function setEquipoLocal(int $equipoLocal): void
    {
        $this->equipoLocal = $equipoLocal;
    }

    /**
     * @return int
     */
    public function getEquipoVisitante(): int
    {
        return $this->equipoVisitante;
    }

    /**
     * @param int $equipoVisitante
     */
    public function setEquipoVisitante(int $equipoVisitante): void
    {
        $this->equipoVisitante = $equipoVisitante;
    }



    public function getId(): int
    {
        return $this->id;
    }

    public function toArray(): array
    {
        return [
            'direccion_encuentro'=>$this->getDireccionEncuentro(),
            'fecha_encuentro'=>$this->getFechaEncuentro(),
            'arbitro'=>$this->getArbitro(),
            'equipoLocal'=>$this->getEquipoLocal(),
            'equipoVisitante'=>$this->getEquipoVisitante(),
            'resultado'=>$this->getResultado()
        ];
    }
}