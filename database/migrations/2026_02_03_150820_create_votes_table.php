<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('poll_id');
            $table->unsignedBigInteger('option_id');
            $table->string('ip_address');
            $table->timestamp('voted_at');

            $table->timestamps();

            $table->foreign('poll_id')
                  ->references('id')
                  ->on('polls')
                  ->onDelete('cascade');

            $table->foreign('option_id')
                  ->references('id')
                  ->on('poll_options')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};
