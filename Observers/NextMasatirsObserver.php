<?php

class NextMasatirsObserver extends PhaseCauserObserver
{
    /**
     * @param Mistara $model
     */
    public function onCreate(PhaseCauser $model): void
    {
        $this->addPhase('next-mistara-has-been-deposit', $model->getPreviousMistara(), $model);

        // You can go beyond to implement a recursive function that adds this phase to even further previous procedures
    }
}
