<?php
require_once "Chest.php";
require_once "DbObject.php";

class GeneratingObject
{
    
    public function getRoom($idRoom)
    {
        return DbObject::getChest($idRoom);

    }

}