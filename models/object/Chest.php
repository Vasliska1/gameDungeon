<?php


class Chest

{
    private $idRoom;
    private $rarity;
    private $points;

    /**
     * @return mixed
     */
    public function getIdRoom()
    {
        return $this->idRoom;
    }

    /**
     * @param mixed $idRoom
     */
    public function setIdRoom($idRoom)
    {
        $this->idRoom = $idRoom;
    }

    /**
     * @return mixed
     */
    public function getRarity()
    {
        return $this->rarity;
    }

    /**
     * @param mixed $rarity
     */
    public function setRarity($rarity)
    {
        $this->rarity = $rarity;
    }

    /**
     * @return mixed
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * @param mixed $points
     */
    public function setPoints($points)
    {
        $this->points = $points;
    }


}