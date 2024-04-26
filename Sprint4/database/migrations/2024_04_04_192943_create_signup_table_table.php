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
        Schema::create('signup_table', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('fname', 50);
            $table->string('lname', 50);
            $table->string('username', 50);
            $table->string('email', 50);
            $table->string('ptype', 50);
            $table->string('pass', 250);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('signup_table');
    }
};
