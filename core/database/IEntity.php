<?php
namespace FUTAPP\core\database;
interface IEntity
{
    public function getId():int;

    public function toArray():array;
}