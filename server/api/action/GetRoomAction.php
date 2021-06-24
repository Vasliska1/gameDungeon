<?php
require_once "ServerAction.php";

class GetRoomAction extends ServerAction
{
    public function processAction(){
        return new ActionResponse(200, $this->repository->getRoom($this->roomId));
    }

}