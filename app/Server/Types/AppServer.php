<?php

namespace App\Server\Types;

use App\Jobs\Server\CreateServer;
use App\Jobs\Server\FinalizeServer;
use App\Jobs\Server\InstallNgnix;
use App\Models\Server;
use App\Server\Traits\CreatesTasks;

class AppServer
{

    use CreatesTasks;
    public function __construct(protected  Server $server)
    {
    }

    public function  jobs(): array
    {
        return [

            1 => new CreateServer($this->server),

            2 => new InstallNgnix(),

            3 => new FinalizeServer()

        ];
    }
}
