<?php

namespace App\Livewire;

use App\Models\Server;
use Livewire\Attributes\Layout;
use Livewire\Component;


class CreateServer extends Component
{

    public function deploy(){

        $created = Server::create([
            'type'=> 'app'
        ]);
    }
    public function render()
    {
        return view('livewire.create-server');
    }
}
