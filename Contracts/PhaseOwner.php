<?php

interface PhaseOwner
{
    public function phaseOwnerObserver(): PhaseOwnerObserver;
}
