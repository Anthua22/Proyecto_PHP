<?php
namespace FUTAPP\app\repository;

use FUATAPP\app\entity\Usuarios;
use FUTAPP\core\database\QueryBuilder;

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


}