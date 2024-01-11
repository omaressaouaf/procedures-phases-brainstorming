<?php

interface PhaseOwner
{
    public function phaseOwnerObserver(): PhaseOwnerObserver;

    public function phaseOwnerIdentifier(): string;
}
