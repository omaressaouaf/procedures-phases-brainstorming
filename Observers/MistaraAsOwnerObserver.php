<?php

class MistaraAsOwnerObserver extends PhaseOwnerObserver
{
    /**
     * @param Mistara $model
     */
    public function onCreate(PhaseOwner $model): void
    {
        $this->addPhase('mistara-deposit', $model);
    }
}
