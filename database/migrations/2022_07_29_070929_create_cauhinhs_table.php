<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('cauhinhs', function (Blueprint $table) {
            $table->id();
            $table->string('ho_va_ten');
            $table->longText('mo_ta');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('cauhinhs');
    }
};
