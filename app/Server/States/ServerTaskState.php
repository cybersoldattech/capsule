<?php

namespace App\Server\States;

use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

abstract  class ServerTaskState extends  State
{
    public static function config(): StateConfig
    {
        return parent::config()
            ->default(Pending::class)
            ->allowTransition(Pending::class, InProgress::class) // Pending -> Inprogress
            ->allowTransition(InProgress::class , Complete::class) // InProgress -> Complete
            ->allowTransition(InProgress::class , Failed::class); // InProgress -> Failed
    }
}
