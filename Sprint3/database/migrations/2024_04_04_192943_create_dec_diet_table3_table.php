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
        Schema::create('dec_diet_table3', function (Blueprint $table) {
            $table->string('Food_Items', 30);
            $table->string('Breakfast', 30);
            $table->string('Lunch', 30);
            $table->string('Dinner', 30);
            $table->string('Total_Calories', 30);
        });

        DB::table('dec_diet_table3')->insert([
            [
                'Food_Items' => 'Rice',
                'Breakfast' => '100g',
                'Lunch' => '120g',
                'Dinner' => '120g',
                'Total_Calories' => '471 kcal',
            ],
            [
                'Food_Items' => 'Lentils',
                'Breakfast' => '50g',
                'Lunch' => '80g',
                'Dinner' => '80g',
                'Total_Calories' => '263 kcal',
            ],
            [
                'Food_Items' => 'Chicken',
                'Breakfast' => '70g',
                'Lunch' => '100g',
                'Dinner' => '100g',
                'Total_Calories' => '254 kcal',
            ],
            [
                'Food_Items' => 'Vegetables',
                'Breakfast' => '120g',
                'Lunch' => '150g',
                'Dinner' => '150g',
                'Total_Calories' => '138 kcal',
            ],
            [
                'Food_Items' => 'Fruits',
                'Breakfast' => '100g',
                'Lunch' => '100g',
                'Dinner' => '100g',
                'Total_Calories' => '47 kcal',
            ],
            [
                'Food_Items' => 'Bread',
                'Breakfast' => '50g',
                'Lunch' => '40g',
                'Dinner' => '40g',
                'Total_Calories' => '159 kcal',
            ],
            [
                'Food_Items' => 'Milk',
                'Breakfast' => '200ml',
                'Lunch' => '-', 
                'Dinner' => '200ml',
                'Total_Calories' => '112 kcal',
            ],
            [
                'Food_Items' => 'Total Calories',
                'Breakfast' => '1454 kcal',
                'Lunch' => '790 kcal',
                'Dinner' => '1494 kcal',
                'Total_Calories' => '3738 kcal',
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
        Schema::dropIfExists('dec_diet_table3');
    }
};
