<?php
require_once "Chest.php";
require_once ROOT."/server/db/ItemDbHelper.php";
require_once "Monster.php";

class ItemRepository
{

    public function getChest($idRoom)
    {
        return ItemDbHelper::getChestFromDb($idRoom);

    }

    public function getMonster($idRoom){

        return ItemDbHelper::getMonsterFromDb($idRoom);
    }
}