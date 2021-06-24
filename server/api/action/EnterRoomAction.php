<?php
require_once "ServerAction.php";

class EnterRoomAction extends ServerAction
{
    public function processAction(){

        $this->repository->setState($this->roomId, "explored", $this->session);
        return new ActionResponse(200, null);
    }
}