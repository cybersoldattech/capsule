<?php

use App\Livewire\CreateServer;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create/server', CreateServer::class);
