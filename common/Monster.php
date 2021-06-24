<?php


class Monster implements JsonSerializable
{

    private $idRoom;
    private $type;
    private $power;
    private $decreaseStrength;

    /**
     * Monster constructor.
     * @param $idRoom
     * @param $type
     * @param $power
     * @param $decreaseStrength
     */
    public function __construct($idRoom, $type, $power, $decreaseStrength)
    {
        $this->idRoom = $idRoom;
        $this->type = $type;
        $this->power = $power;
        $this->decreaseStrength = $decreaseStrength;
    }


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
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

}