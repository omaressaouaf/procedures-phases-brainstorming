<?php

abstract class PhaseCauserObserver
{
    private ?PhaseOwner $scopedPhaseOwner = null;

    public function scopeOnlyTo(PhaseOwner $phaseOwner): self
    {
        $this->scopedPhaseOwner = $phaseOwner;

        return $this;
    }

    private function ownerIsTheScopedOne(PhaseOwner $phaseOwner): bool
    {
        if (!$this->scopedPhaseOwner instanceof PhaseOwner) {
            return true;
        }

        return $phaseOwner::class === $this->scopedPhaseOwner::class &&
            $phaseOwner->phaseOwnerIdentifier() === $this->scopedPhaseOwner->phaseOwnerIdentifier();
    }

    public function addPhase($event, PhaseOwner $phaseOwner, PhaseCauser $phaseCauser, ?array $data = null): void
    {
        if ($this->ownerIsTheScopedOne($phaseOwner)) {
            // Add the phase
        }
    }

    abstract public function onCreate(PhaseCauser $model): void;
}
