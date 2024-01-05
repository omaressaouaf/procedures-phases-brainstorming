<?php

class Audience implements PhaseCauser
{
    use RegisterObserversIntoModelLifeCycle;

    public function phaseCauserObserver(): PhaseCauserObserver
    {
        return new AudienceObserver();
    }

    /**
     * Returns the parent mistara (that owns this audience - one to many)
     */
    public function getMistara(): Mistara
    {
        return new Mistara();
    }
}
