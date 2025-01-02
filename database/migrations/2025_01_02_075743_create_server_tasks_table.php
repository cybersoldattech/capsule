<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('server_tasks', function (Blueprint $table) {
            $table->id();

            $table->ForeignId('server_id')->constrained('servers')->onDelete('cascade');

            $table->integer('order');

            $table->string('job');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('server_tasks');
    }
};
