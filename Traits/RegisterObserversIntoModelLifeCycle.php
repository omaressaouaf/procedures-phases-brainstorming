<?php

trait RegisterObserversIntoModelLifeCycle
{
    public static function bootRegisterObserversIntoModelLifeCycle()
    {
        if (in_array(PhaseOwner::class, class_implements(self::class))) {
            static::created(function (PhaseOwner $model) {
                $model->phaseOwnerObserver()->onCreate($model);
            });
        }

        if (in_array(PhaseCauser::class, class_implements(self::class))) {
            static::created(function (PhaseCauser $model) {
                $model->phaseCauserObserver()->onCreate($model);
            });
        }
    }
}
