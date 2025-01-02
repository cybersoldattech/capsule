<?php

namespace App\Models;

use App\Observers\ServerObserver;
use App\Server\States\InProgress;
use App\Server\Traits\CreatesTasks;
use Illuminate\Console\View\Components\Task;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[ObservedBy([ServerObserver::class])]
class Server extends Model
{
    protected $guarded= false;


    public function tasks(): HasMany
    {
        return $this->hasMany(ServerTask::class)->orderBy('order', 'asc');
    }

    public function taskCurrentlyInProgress(){
        return $this->tasks()->where('state', InProgress::class)->first();
    }


}
