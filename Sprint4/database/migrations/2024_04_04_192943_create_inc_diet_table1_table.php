<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('inc_diet_table1', function (Blueprint $table) {
            $table->string('Food_Items', 30);
            $table->string('Breakfast', 30);
            $table->string('Lunch', 30);
            $table->string('Dinner', 30);
            $table->string('Total_Calories', 30);
        });

        DB::table('inc_diet_table1')->insert([
            [
                'Food_Items' => 'Rice',
                'Breakfast' => '75g',
                'Lunch' => '80g',
                'Dinner' => '85g',
                'Total_Calories' => '350 kcal',
            ],
            [
                'Food_Items' => 'Lentils',
                'Breakfast' => '30g',
                'Lunch' => '40g',
                'Dinner' => '40g',
                'Total_Calories' => '170 kcal',
            ],
            [
                'Food_Items' => 'Chicken',
                'Breakfast' => '70g',
                'Lunch' => '50g',
                'Dinner' => '50g',
                'Total_Calories' => '254 kcal',
            ],
            [
                'Food_Items' => 'Vegetables',
                'Breakfast' => '65g',
                'Lunch' => '80g',
                'Dinner' => '85g',
                'Total_Calories' => '138 kcal',
            ],
            [
                'Food_Items' => 'Fruits',
                'Breakfast' => '150g',
                'Lunch' => '150g',
                'Dinner' => '150g',
                'Total_Calories' => '75 kcal',
            ],
            [
                'Food_Items' => 'Bread',
                'Breakfast' => '50g',
                'Lunch' => '30g',
                'Dinner' => '35g',
                'Total_Calories' => '105 kcal',
            ],
            [
                'Food_Items' => 'Milk',
                'Breakfast' => '110ml',
                'Lunch' => '-', 
                'Dinner' => '100ml',
                'Total_Calories' => '70 kcal',
            ],
            [
                'Food_Items' => 'Total Calories',
                'Breakfast' => '750 kcal',
                'Lunch' => '410 kcal',
                'Dinner' => '854 kcal',
                'Total_Calories' => '2014 kcal',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inc_diet_table1');
    }
};
