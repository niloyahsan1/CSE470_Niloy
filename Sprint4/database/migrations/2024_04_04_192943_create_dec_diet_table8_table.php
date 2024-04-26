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
        Schema::create('dec_diet_table8', function (Blueprint $table) {
            $table->string('Food_Items', 30);
            $table->string('Breakfast', 30);
            $table->string('Lunch', 30);
            $table->string('Dinner', 30);
            $table->string('Total_Calories', 30);
        });

        DB::table('dec_diet_table8')->insert([
            [
                'Food_Items' => 'Rice',
                'Breakfast' => '80g',
                'Lunch' => '80g',
                'Dinner' => '80g',
                'Total_Calories' => '314 kcal',
            ],
            [
                'Food_Items' => 'Lentils',
                'Breakfast' => '30g',
                'Lunch' => '50g',
                'Dinner' => '50g',
                'Total_Calories' => '164 kcal',
            ],
            [
                'Food_Items' => 'Fish',
                'Breakfast' => '50g',
                'Lunch' => '70g',
                'Dinner' => '70g',
                'Total_Calories' => '154 kcal',
            ],
            [
                'Food_Items' => 'Vegetables',
                'Breakfast' => '100g',
                'Lunch' => '120g',
                'Dinner' => '120g',
                'Total_Calories' => '110 kcal',
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
                'Breakfast' => '30g',
                'Lunch' => '20g',
                'Dinner' => '20g',
                'Total_Calories' => '75 kcal',
            ],
            [
                'Food_Items' => 'Milk',
                'Breakfast' => '100ml',
                'Lunch' => '-', 
                'Dinner' => '100ml',
                'Total_Calories' => '56 kcal',
            ],
            [
                'Food_Items' => 'Total Calories',
                'Breakfast' => '940 kcal',
                'Lunch' => '440 kcal',
                'Dinner' => '854 kcal',
                'Total_Calories' => '2234 kcal',
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
        Schema::dropIfExists('dec_diet_table8');
    }
};
