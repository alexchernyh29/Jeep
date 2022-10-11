<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app', function (Blueprint $table) {
            $table->id();
            $table->string('tip');
            $table->string('marka');
            $table->string('model');
            $table->string('korobka');
            $table->string('fio');
            $table->string('email')->unique();
            $table->string('mobile', 12);
            $table->string('gos',8);
            $table->string('st');
            $table->string('comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app');
    }
};
