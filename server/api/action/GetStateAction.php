<?php
require_once "ServerAction.php";

class GetStateAction extends ServerAction
{
    public function processAction(){
        return new ActionResponse(200, $this->repository->getState($this->roomId, $this->session));

    }
}