<?php

namespace App\Jobs\Server;

use App\Server\Interfaces\ServerJob;
use Illuminate\Bus\Batchable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class InstallNgnix implements ShouldQueue , ServerJob
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
        return 'Create Installation Ngnix';
    }

    public function description(): string
    {
        return 'Install Ngnix ';
    }
}
