<?php


require_once __DIR__.'/../../core/database/IEntity.php';

class Equipo implements IEntity
{
    private int $id;
    private string $nombre;
    private string $foto;
    private string $correo;
    private string $direccion_campo;

    public function getId(): int
    {
        return $this->id;
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
    public function getCorreo(): string
    {
        return $this->correo;
    }

    /**
     * @param string $correo
     */
    public function setCorreo(string $correo): void
    {
        $this->correo = $correo;
    }

    /**
     * @return string
     */
    public function getDireccionCampo(): string
    {
        return $this->direccion_campo;
    }

    /**
     * @param string $direccion_campo
     */
    public function setDireccionCampo(string $direccion_campo): void
    {
        $this->direccion_campo = $direccion_campo;
    }



    public function toArray(): array
    {
        return [
            'nombre'=>$this->getNombre(),
            'correo'=>$this->getCorreo(),
            'foto'=>$this->getFoto(),
            'direccion_campo'=>$this->getDireccionCampo()
        ];
    }
}