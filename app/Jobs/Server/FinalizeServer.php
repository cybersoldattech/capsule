<?php

namespace App\Jobs\Server;

use App\Server\Interfaces\ServerJob;
use Illuminate\Bus\Batchable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class FinalizeServer implements ShouldQueue , ServerJob
{
    use Queueable;
    use Batchable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        sleep(2);
    }

    public function title(): string
    {
        return 'Finalize Server';
    }

    public function description(): string
    {
        return 'Description Finalize Server';
    }
}
