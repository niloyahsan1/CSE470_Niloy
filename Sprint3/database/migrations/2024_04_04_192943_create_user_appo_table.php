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
        Schema::create('user_appo', function (Blueprint $table) {
            $table->integer('c_no', true);
            $table->string('full_name', 50);
            $table->string('email', 50);
            $table->integer('phn');
            $table->longText('msg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_appo');
    }
};
