<?php
require_once "ServerAction.php";

class OpenChestAction extends ServerAction
{


    public function processAction()
    {
        $chest = $this->repository->getChest($this->roomId);
        $this->repository->setState($this->roomId, "took_chest", $this->session);
        $this->repository->addPoints($this->session, $this->repository->getChest($this->roomId)->getPoints());
        return new ActionResponse(200, $chest);
    }
}