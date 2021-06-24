<?php


class StateRoom implements JsonSerializable
{

    private $idRoom;
    private $state;
    private $idSession;
    private $objectPower;


    public function __construct($idRoom, $state, $idSession, $objectPower)
    {
        $this->idRoom = $idRoom;
        $this->state = $state;
        $this->idSession = $idSession;
        $this->objectPower = $objectPower;
    }
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
    /**
     * @return mixed
     */
    public function getIdRoom()
    {
        return $this->idRoom;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return mixed
     */
    public function getIdSession()
    {
        return $this->idSession;
    }

    /**
     * @return mixed
     */
    public function getObjectPower()
    {
        return $this->objectPower;
    }




}