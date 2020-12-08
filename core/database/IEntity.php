<?php

interface IEntity
{
    public function getId():int;

    public function toArray():array;
}