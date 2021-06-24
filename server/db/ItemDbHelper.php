<?php


class ItemDbHelper
{
    private $mysql;

    public function __construct($mysql)
    {
        $this->mysql = $mysql;
    }

    public function getChestFromDb($idRoom)
    {
        $sql = "SELECT * FROM chest WHERE `id_room` = '" . $idRoom . "' ";
        $result = mysqli_query($this->mysql, $sql);
        $result = $result->fetch_array();
        if (empty($result)) {
            throw new Exception("Cannot find chest");
        }
        $chest = new Chest($idRoom, $result["rarity"], $result["points"]);
        return $chest;
    }


    public function getMonsterFromDb($idRoom)
    {
        $sql = "SELECT * FROM monster WHERE `id_room` = '" . $idRoom . "' ";
        $result = mysqli_query($this->mysql, $sql);
        $result = $result->fetch_array();
        if (empty($result)) {
            throw new Exception("Cannot find monster");
        }
        $monster = new Monster($idRoom, $result["type_monster"], $result["power"], sqrt($result["power"]));
        return $monster;
    }

}