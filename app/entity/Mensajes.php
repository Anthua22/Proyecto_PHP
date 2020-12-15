<?php


namespace FUTAPP\app\entity;


use DateTime;
use FUTAPP\core\database\IEntity;

class Mensajes implements IEntity
{
    private int $id;
    private int $emisor;
    private int $receptor;
    private string $mensaje;
    private $hora;

    /**
     * Mensajes constructor.
     */
    public function __construct()
    {
        if (is_null($this->hora)){
            $this->hora = new DateTime();
        }else{
            $this->hora = new DateTime($this->hora);
        }

    }

    /**
     * @return string
     */


    public function getMensaje(): string
    {
        return $this->mensaje;
    }

    /**
     * @param string $mensaje
     */
    public function setMensaje(string $mensaje): void
    {
        $this->mensaje = $mensaje;
    }


    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getEmisor(): int
    {
        return $this->emisor;
    }

    /**
     * @param int $emisor
     */
    public function setEmisor(int $emisor): void
    {
        $this->emisor = $emisor;
    }

    /**
     * @return int
     */
    public function getReceptor(): int
    {
        return $this->receptor;
    }

    /**
     * @param int $receptor
     */
    public function setReceptor(int $receptor): void
    {
        $this->receptor = $receptor;
    }

    /**
     * @return mixed
     */
    public function getHora():DateTime
    {
        return $this->hora;
    }

    /**
     * @param mixed $hora
     */
    public function setHora($hora): void
    {
        $this->hora = $hora;
    }



    public function toArray(): array
    {
        return [
            'emisor'=>$this->getEmisor(),
            'receptor'=>$this->getReceptor(),
            'mensaje'=>$this->getMensaje(),
            'hora'=>$this->getHora()
        ];
    }
}