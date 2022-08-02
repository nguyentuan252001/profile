<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->integer('age');
            $table->string('qualification');
            $table->string('nghe_nghiep');
            $table->string('language');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('abouts');
    }
};
