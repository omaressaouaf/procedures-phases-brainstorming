<?php

class AudienceObserver extends PhaseCauserObserver
{
    /**
     * @param Audience $model
     */
    public function onCreate(PhaseCauser $model): void
    {
        $this->addPhase('audience-has-been-established', $model->getMistara(), $model);
    }
}
