<?php

class Mistara implements PhaseOwner, PhaseCauser
{
    use RegisterObserversIntoModelLifeCycle;

    /**
     * By Laravel
     */
    public static function findById(): ?Mistara
    {
        return new Mistara();
    }

    public function getId(): string
    {
        return "id";
    }

    public function phaseOwnerObserver(): PhaseOwnerObserver
    {
        return new MistaraAsOwnerObserver();
    }

    public function phaseOwnerIdentifier(): string
    {
        return $this->getId();
    }

    public function phaseCauserObserver(): PhaseCauserObserver
    {
        return new MistaraAsCauserObserver();
    }

    /**
     * Returns the next masatirs that come after this one (one to many)
     *
     * @return Mistara[]
     */
    public function getNextMasatirs()
    {
        return [
            new Mistara(),
            new Mistara(),
            new Mistara(),
        ];
    }

    /**
     * Returns the previous mistara that comes before this one (one to many)
     */
    public function getPreviousMistara(): Mistara
    {
        return new Mistara();
    }

    /**
     * Returns the audiences of this mistara (one to many)
     *
     * @return Audience[]
     */
    public function getAudiences()
    {
        return [
            new Audience(),
            new Audience(),
            new Audience(),
        ];
    }
}
