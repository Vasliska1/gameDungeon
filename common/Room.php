<?php


class Room implements JsonSerializable
{

    private $id;
    private $color;
    private $roomObject;
    private $left;
    private $right;
    private $up;
    private $down;
    private $isStart;
    private $isFinish;

    /**
     * Room constructor.
     * @param $id
     * @param $color
     * @param $roomObject
     * @param $left
     * @param $right
     * @param $up
     * @param $down
     * @param $isStart
     * @param $isFinish
     */
    public function __construct($id, $roomObject, $left, $right, $up, $down, $isStart, $isFinish)
    {
        $this->id = $id;
        $this->roomObject = $roomObject;
        $this->left = $left;
        $this->right = $right;
        $this->up = $up;
        $this->down = $down;
        $this->isStart = $isStart;
        $this->isFinish = $isFinish;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getRoomObject()
    {
        return $this->roomObject;
    }

    /**
     * @return mixed
     */
    public function getLeft()
    {
        return $this->left;
    }

    /**
     * @return mixed
     */
    public function getRight()
    {
        return $this->right;
    }

    /**
     * @return mixed
     */
    public function getUp()
    {
        return $this->up;
    }

    /**
     * @return mixed
     */
    public function getDown()
    {
        return $this->down;
    }

    /**
     * @return mixed
     */
    public function getIsStart()
    {
        return $this->isStart;
    }

    /**
     * @return mixed
     */
    public function getIsFinish()
    {
        return $this->isFinish;
    }



    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @param mixed $roomObject
     */
    public function setRoomObject($roomObject)
    {
        $this->roomObject = $roomObject;
    }

    /**
     * @param mixed $left
     */
    public function setLeft($left)
    {
        $this->left = $left;
    }

    /**
     * @param mixed $right
     */
    public function setRight($right)
    {
        $this->right = $right;
    }

    /**
     * @param mixed $up
     */
    public function setUp($up)
    {
        $this->up = $up;
    }

    /**
     * @param mixed $down
     */
    public function setDown($down)
    {
        $this->down = $down;
    }

    /**
     * @param mixed $isStart
     */
    public function setIsStart($isStart)
    {
        $this->isStart = $isStart;
    }

    /**
     * @param mixed $isFinish
     */
    public function setIsFinish($isFinish)
    {
        $this->isFinish = $isFinish;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
