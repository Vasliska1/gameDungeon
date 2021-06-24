<?php
require_once "ServerAction.php";

class GetScoreAction extends ServerAction
{


    public function processAction()
    {
        return new ActionResponse(200, $this->repository->getScore($this->session));

    }
}