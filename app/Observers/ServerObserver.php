<?php

namespace App\Observers;

use App\Models\Server;
use App\Server\ServerTypeFactory;
use App\Server\States\Complete;
use App\Server\States\Failed;
use App\Server\States\InProgress;
use App\Server\Traits\CreatesTasks;
use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Bus;

class ServerObserver
{
    use CreatesTasks;
    /**
     * Handle the Server "created" event.
     */
    public function created(Server $server): void
    {
        $serverType  = ServerTypeFactory::make($server);

      $server->tasks()->saveMany($serverType->tasks());

        $batch = Bus::batch($serverType->jobs())

            ->before(function (Batch $batch) use ($server) {
                $server->tasks()->first()->state->TransitionTo(InProgress::class);
            })

            ->progress(function (Batch $batch) use ($server) {

                $task = $server->taskCurrentlyInProgress();

                $task->state->transitionTo(Complete::class);

                //dd($task->next());

                $task->next()
                    ->state
                    ->transitionTo(InProgress::class);
            })
            ->catch( function (Batch $batch) use ($server) {
                $server->taskCurrentlyInProgress()
                ->state->transitionTo(Failed::class);
            })

            ->then(function (Batch $batch) use ($server) {

                $server->update([

                    'batch_id' => null,

                    'provisioned_at' => now(),

                ]);

                $server->tasks()->delete();

            })

            ->dispatch();

        $server->update([
            'batch_id' => $batch->id,
        ]);
    }

}
