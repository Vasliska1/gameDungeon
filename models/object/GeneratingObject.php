<?php
require_once "Chest.php";
require_once "DbObject.php";
require_once "Monster.php";

class GeneratingObject
{

    public function getChest($idRoom)
    {
        return DbObject::getChestFromDb($idRoom);

    }

    public function getMonster($idRoom){

        return DbObject::getMonsterFromDb($idRoom);
    }
}