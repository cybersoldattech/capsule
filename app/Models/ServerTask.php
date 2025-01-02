<?php

namespace App\Models;

use App\Server\States\ServerTaskState;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\ModelStates\HasStates;

class ServerTask extends Model
{
    use HasFactory;
    use HasStates;
    protected  $guarded = false;
    protected  $casts = [
        'state' => ServerTaskState::class,
    ];


    public function server(): BelongsTo
    {
        return $this->belongsTo(Server::class);
    }

    public function next(){
        return $this->whereBelongsTo($this->server)->where('order','>', $this->order)->first();
    }
}
