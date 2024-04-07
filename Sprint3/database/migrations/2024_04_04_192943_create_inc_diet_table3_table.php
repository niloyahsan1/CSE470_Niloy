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
        Schema::create('inc_diet_table3', function (Blueprint $table) {
            $table->string('Food_Items', 30);
            $table->string('Breakfast', 30);
            $table->string('Lunch', 30);
            $table->string('Dinner', 30);
            $table->string('Total_Calories', 30);
        });

        DB::table('inc_diet_table3')->insert([
            [
                'Food_Items' => 'Rice',
                'Breakfast' => '150g',
                'Lunch' => '130g',
                'Dinner' => '130g',
                'Total_Calories' => '510 kcal',
            ],
            [
                'Food_Items' => 'Lentils',
                'Breakfast' => '60g',
                'Lunch' => '80g',
                'Dinner' => '85g',
                'Total_Calories' => '330 kcal',
            ],
            [
                'Food_Items' => 'Chicken',
                'Breakfast' => '70g',
                'Lunch' => '120g',
                'Dinner' => '120g',
                'Total_Calories' => '300 kcal',
            ],
            [
                'Food_Items' => 'Vegetables',
                'Breakfast' => '125g',
                'Lunch' => '160g',
                'Dinner' => '165g',
                'Total_Calories' => '162 kcal',
            ],
            [
                'Food_Items' => 'Egg',
                'Breakfast' => '2 boiled',
                'Lunch' => '-', 
                'Dinner' => '2 boiled',
                'Total_Calories' => '140 kcal',
            ],
            [
                'Food_Items' => 'Bread',
                'Breakfast' => '50g',
                'Lunch' => '48g',
                'Dinner' => '45g',
                'Total_Calories' => '200 kcal',
            ],
            [
                'Food_Items' => 'Milk',
                'Breakfast' => '250 ml',
                'Lunch' => '-', 
                'Dinner' => '150 ml',
                'Total_Calories' => '130 kcal',
            ],
            [
                'Food_Items' => 'Total Calories',
                'Breakfast' => '1550 kcal',
                'Lunch' => '810 kcal',
                'Dinner' => '1500 kcal',
                'Total_Calories' => '3860 kcal',
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
        Schema::dropIfExists('inc_diet_table3');
    }
};
