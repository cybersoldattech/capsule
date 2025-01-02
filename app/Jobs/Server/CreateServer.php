<?php

namespace App\Jobs\Server;

use App\Models\Server;
use App\Server\Interfaces\ServerJob;
use Illuminate\Bus\Batchable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\SerializesModels;

class CreateServer implements ShouldQueue ,ServerJob
{
    use Queueable;
    use SerializesModels;
    use Batchable;
    private Server $serverModel;

    /**
     * Create a new job instance.
     */
    public function __construct(protected  Server $server)
    {
        $this->serverModel = $server;
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
        return 'Create Server : #'. $this->serverModel?->id;
    }

    public function description(): string
    {
        return 'Description Create Server';
    }
}
