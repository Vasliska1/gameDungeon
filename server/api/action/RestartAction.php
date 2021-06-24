<?php
require_once "ServerAction.php";

class RestartAction extends ServerAction
{

    public function processAction()
    {
        $this->repository->updateState($this->session);
        $this->repository->clearScore($this->session);

        return new ActionResponse(200, null);
    }
}