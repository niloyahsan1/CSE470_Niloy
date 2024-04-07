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
        Schema::create('dec_diet_table4', function (Blueprint $table) {
            $table->string('Food_Items', 30);
            $table->string('Breakfast', 30);
            $table->string('Lunch', 30);
            $table->string('Dinner', 30);
            $table->string('Total_Calories', 30);
        });

        DB::table('dec_diet_table4')->insert([
            [
                'Food_Items' => 'Rice',
                'Breakfast' => '120g',
                'Lunch' => '150g',
                'Dinner' => '150g',
                'Total_Calories' => '589 kcal',
            ],
            [
                'Food_Items' => 'Lentils',
                'Breakfast' => '60g',
                'Lunch' => '100g',
                'Dinner' => '100g',
                'Total_Calories' => '329 kcal',
            ],
            [
                'Food_Items' => 'Chicken',
                'Breakfast' => '100g',
                'Lunch' => '120g',
                'Dinner' => '120g',
                'Total_Calories' => '306 kcal',
            ],
            [
                'Food_Items' => 'Vegetables',
                'Breakfast' => '150g',
                'Lunch' => '200g',
                'Dinner' => '200g',
                'Total_Calories' => '184 kcal',
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
                'Breakfast' => '60g',
                'Lunch' => '50g',
                'Dinner' => '50g',
                'Total_Calories' => '239 kcal',
            ],
            [
                'Food_Items' => 'Milk',
                'Breakfast' => '250ml',
                'Lunch' => '-',
                'Dinner' => '250ml',
                'Total_Calories' => '140 kcal',
            ],
            [
                'Food_Items' => 'Total Calories',
                'Breakfast' => '1755 kcal',
                'Lunch' => '790 kcal',
                'Dinner' => '1536 kcal',
                'Total_Calories' => '4081 kcal',
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
        Schema::dropIfExists('dec_diet_table4');
    }
};
