<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->string('name');
            $table->string('mo_ta');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('education');
    }
};
