<?php
namespace FUATAPP\app\entity;

use FUTAPP\core\database\IEntity;

class Usuarios implements IEntity
{

    private int $id;
    private string $dni;
    private string $pass;
    private string $nombre_completo;
    private string $foto;
    private string $email;
    private $fecha_nacimiento;
    private string $telefono;

    public function getId(): int
    {
       return $this->id;
    }

    /**
     * @return string
     */
    public function getDni(): string
    {
        return $this->dni;
    }

    /**
     * @param string $dni
     */
    public function setDni(string $dni): void
    {
        $this->dni = $dni;
    }

    /**
     * @return string
     */
    public function getPass(): string
    {
        return $this->pass;
    }

    /**
     * @param string $pass
     */
    public function setPass(string $pass): void
    {
        $this->pass = $pass;
    }

    /**
     * @return string
     */
    public function getNombreCompleto(): string
    {
        return $this->nombre_completo;
    }

    /**
     * @param string $nombre_completo
     */
    public function setNombreCompleto(string $nombre_completo): void
    {
        $this->nombre_completo = $nombre_completo;
    }

    /**
     * @return string
     */
    public function getFoto(): string
    {
        return $this->foto;
    }

    /**
     * @param string $foto
     */
    public function setFoto(string $foto): void
    {
        $this->foto = $foto;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getFechanacimiento()
    {
        return $this->fecha_nacimiento;
    }

    /**
     * @param mixed $fechanacimiento
     */
    public function setFechanacimiento($fechanacimiento): void
    {
        $this->fecha_nacimiento = $fechanacimiento;
    }

    /**
     * @return string
     */
    public function getTelefono(): string
    {
        return $this->telefono;
    }

    /**
     * @param string $telefono
     */
    public function setTelefono(string $telefono): void
    {
        $this->telefono = $telefono;
    }



    public function toArray(): array
    {
        return [
            'nombre_completo'=>$this->nombre_completo,
            'dni'=>$this->dni,
            'foto'=>$this->foto,
            'fecha_nacimiento'=>$this->fecha_nacimiento,
            'email'=>$this->email,
            'pass'=>$this->pass,
            'telefono'=>$this->telefono
        ];
    }
}