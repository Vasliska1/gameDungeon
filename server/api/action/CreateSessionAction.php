<?php
require_once "ServerAction.php";

class CreateSessionAction extends ServerAction
{

    public function processAction()
    {
        $session =  $this->repository->addNewUserToSession($this->username);
        $this->repository->addRoomStateForPlayer($session);

        return new ActionResponse(200, $session);
    }
}