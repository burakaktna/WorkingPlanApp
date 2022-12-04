<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();

            $table->foreignId('provider_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->enum('level', [1,2,3,4,5]);
            $table->tinyInteger('estimated_duration');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
