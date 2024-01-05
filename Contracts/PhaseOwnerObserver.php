<?php

abstract class PhaseOwnerObserver
{
    public function addPhase($event, PhaseOwner $phaseOwner, ?array $data = null): void
    {
        // Add the phase
    }

    abstract public function onCreate(PhaseOwner $model): void;
}
