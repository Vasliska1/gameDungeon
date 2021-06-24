<?php
require_once "ServerAction.php";

class AttackMonsterAction extends ServerAction
{

    public function processAction()
    {
        $monster = $this->repository->getMonster($this->roomId);
        $hitPlayer = rand(1, $monster->getPower() * 1.5);
        $state = $this->repository->getState($this->roomId, $this->session);
        if ($state->getObjectPower() == -1) {
            $this->repository->updatePowerObject($this->roomId, $monster->getPower(), $this->session);
        }
        $state = $this->repository->getState($this->roomId, $this->session);

        if ($state->getObjectPower() > $hitPlayer) {

            $this->repository->updatePowerObject($this->roomId, $state->getObjectPower() - $monster->getDecreaseStrength(), $this->session);
            $this->repository->setState($this->roomId, "attack_monster", $this->session);

        } else {

            $this->repository->addPoints($this->session, $state->getObjectPower());
            $this->repository->setState($this->roomId, "win_monster", $this->session);

        }

        return new ActionResponse(200, array('monster' => $monster, 'hit' => $hitPlayer));
    }
}