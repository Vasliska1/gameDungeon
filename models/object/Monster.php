<?php


class Monster
{

    private $idRoom;
    private $type;
    private $power;
    private $decreaseStrength;

    /**
     * @return mixed
     */
    public function getDecreaseStrength()
    {
        return $this->decreaseStrength;
    }

    /**
     * @param mixed $decreaseStrength
     */
    public function setDecreaseStrength($decreaseStrength)
    {
        $this->decreaseStrength = $decreaseStrength;
    }


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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getPower()
    {
        return $this->power;
    }

    /**
     * @param mixed $power
     */
    public function setPower($power)
    {
        $this->power = $power;
    }


}