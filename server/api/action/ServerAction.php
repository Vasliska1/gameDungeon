<?php


abstract class ServerAction
{
    protected $roomId;
    protected $session;
    protected $username;
    protected $repository;

    /**
     * ServerAction constructor.
     * @param $roomId
     * @param $session
     * @param $username
     */
    public function __construct($repository, $roomId, $session, $username)
    {
        $this->repository = $repository;
        $this->roomId = $roomId;
        $this->session = $session;
        $this->username = $username;
    }

    abstract public function processAction();
}


class ActionResponse
{
    public $code;
    public $result;

    /**
     * ActionResponse constructor.
     * @param $code
     * @param $result
     */
    public function __construct($code, $result)
    {
        $this->code = $code;
        $this->result = $result;
    }


}
