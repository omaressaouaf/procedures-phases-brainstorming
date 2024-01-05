<?php

abstract class PhaseCauserObserver
{
    public function addPhase($event, PhaseOwner $phaseOwner, ?PhaseCauser $phaseCauser = null, ?array $data = null): void
    {
        // Add the phase
    }

    abstract public function onCreate(PhaseCauser $model): void;
}
