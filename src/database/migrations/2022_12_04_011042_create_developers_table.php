<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('developers', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->enum('level', [1,2,3,4,5]);
            $table->tinyInteger('capacity')->default(45);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('developers');
    }
};
