<?php
require_once __DIR__.'../../core/database/QueryBuilder.php';

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