<?php
namespace FUTAPP\app\entity;


use FUTAPP\core\database\IEntity;

class Usuarios implements IEntity
{
    const RUTA_FOTO='/../public/images/users/';

    private int $id;
    private string $password;
    private string $nombre;
    private string $apellidos;
    private string $foto;
    private string $role;
    private string $email;
    private $fecha_nacimiento;
    private string $telefono;

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    public function getId(): int
    {
       return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }



    public function getPathFoto():string{
        return self::RUTA_FOTO.$this->getFoto();
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }


    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    /**
     * @param string $apellidos
     */
    public function setApellidos(string $apellidos): void
    {
        $this->apellidos = $apellidos;
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
            'nombre'=>$this->getNombre(),
            'apellidos'=>$this->getApellidos(),
            'foto'=>$this->getFoto(),
            'fecha_nacimiento'=>$this->getFechanacimiento(),
            'email'=>$this->getEmail(),
            'role'=>$this->getRole(),
            'password'=>$this->getPassword(),
            'telefono'=>$this->getTelefono()
        ];
    }

    public function toArrayInfo():array{
        return [
            'nombre'=>$this->getNombre(),
            'apellidos'=>$this->getApellidos(),
            'foto'=>$this->getFoto(),
            'email'=>$this->getEmail(),
            'role'=>$this->getRole(),
            'telefono'=>$this->getTelefono()
        ];

    }
}