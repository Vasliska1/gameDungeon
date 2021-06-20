<?php


class DbObject
{

    public function getChest($idRoom)
    {

        $chest = new Chest();
        $chest->setId($idRoom);
        $chest->setPoints(2);
        $chest->setRarity("rare");
        /* $mysql = openDB();

      $sql = "SELECT * FROM chest WHERE `id` = '".$idRoom."' ";
      if($result = mysqli_query($this->mysql, $sql)){
          $chest->setPoints($result["points"]);
          $chest->setPoints($result["rarity"];
        }

      */
        return $chest;
    }

}