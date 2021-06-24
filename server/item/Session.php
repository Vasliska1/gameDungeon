<?php


class Session implements JsonSerializable
{
private $idSession;
private $name;
private $score;

    /**
     * Session constructor.
     * @param $idSession
     * @param $name
     * @param $score
     */
    public function __construct($idSession, $name, $score=0)
    {
        $this->idSession = $idSession;
        $this->name = $name;
        $this->score = $score;
    }
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

}