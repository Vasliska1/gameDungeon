<?php



class Score implements JsonSerializable
{
    private $idSession;
    private $currentScore;

    /**
     * Score constructor.
     * @param $idSession
     * @param $currentScore
     */
    public function __construct($idSession, $currentScore)
    {
        $this->idSession = $idSession;
        $this->currentScore = $currentScore;
    }


    /**
     * @return mixed
     */
    public function getCurrentScore()
    {
        return $this->currentScore;
    }
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

}