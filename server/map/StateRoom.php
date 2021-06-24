<?php


class StateRoom
{

    private $id_room;
    private $state;
    private $id_session;
    private $object_power;

    /**
     * StateRoom constructor.
     * @param $id_room
     * @param $state
     * @param $id_session
     * @param $object_power
     */
    public function __construct($id_room, $state, $id_session, $object_power)
    {
        $this->id_room = $id_room;
        $this->state = $state;
        $this->id_session = $id_session;
        $this->object_power = $object_power;
    }

    /**
     * @return mixed
     */
    public function getIdRoom()
    {
        return $this->id_room;
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
        return $this->id_session;
    }

    /**
     * @return mixed
     */
    public function getObjectPower()
    {
        return $this->object_power;
    }




}