<?php

trait RegisterObserversIntoModelLifeCycle
{
    public static function bootRegisterObserversIntoModelLifeCycle()
    {
        static::created(function ($model) {
            if ($model instanceof PhaseOwner) {
                $model->phaseOwnerObserver()->onCreate($model);
            }

            if ($model instanceof PhaseCauser) {
                $model->phaseCauserObserver()->onCreate($model);
            }
        });
    }
}
