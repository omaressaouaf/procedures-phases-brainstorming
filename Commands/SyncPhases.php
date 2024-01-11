<?php

class SyncPhases
{
    public function handle(string $id): void
    {
        $mistara = Mistara::findById($id);

        if (!$mistara instanceof PhaseOwner) {
            throw new Exception('Mistara is not a phase owner');
        }

        /**
         * Start by deleing all phases of the mistara to start the timeline from scratch, then we need to execute the onCreate method for the phase
         * owner observer and for each phase causers observers
         */

        // Record the mistara phase
        $mistara->phaseOwnerObserver()->onCreate($mistara);


        // Record the audiences phases
        /**
         * @var Audience
         */
        foreach ($mistara->getAudiences() as $audience) {
            $audience->phaseCauserObserver()->onCreate($audience);
        }

        // Record the next masatir phases
        /**
         * @var Mistara
         */
        foreach ($mistara->getNextMasatirs() as $nextMistara) {
            $nextMistara->phaseCauserObserver()->scopeOnlyTo($nextMistara)->onCreate($mistara);
        }
    }
}

/**
 * The synchronization will create a timeline of this sort
 *
 *  Mistara deposit
 *  🕒
 *  🕒
 *  Audience has been established
 *  🕒
 *  🕒
 *  Audience has been established
 *  🕒
 *  🕒
 *  Next mistara has been deposit
 *  🕒
 *  🕒
 *  Second next mistara has been deposit (If you choose to record recursively with the NextMasatirsObserver - take a look at it)
 */

/**
 * If you run the synchronization for the next mistara it will produce something of this sort
 *
 *  Mistara deposit
 *  🕒
 *  🕒
 *  Audience has been established
 *  🕒
 *  🕒
 *  Next mistara has been deposit
 */


/**
 * If you run the synchronization for the NEXT NEXT mistara it will produce something of this sort
 *
 *  Mistara deposit
 *  🕒
 *  🕒
 */
