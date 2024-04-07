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
        Schema::create('inc_diet_table7', function (Blueprint $table) {
            $table->string('Food_Items', 30);
            $table->string('Breakfast', 30);
            $table->string('Lunch', 30);
            $table->string('Dinner', 30);
            $table->string('Total_Calories', 30);
        });

        DB::table('inc_diet_table7')->insert([
            [
                'Food_Items' => 'Rice',
                'Breakfast' => '120g',
                'Lunch' => '120g',
                'Dinner' => '120g',
                'Total_Calories' => '415 kcal',
            ],
            [
                'Food_Items' => 'Lentils',
                'Breakfast' => '65g',
                'Lunch' => '85g',
                'Dinner' => '85g',
                'Total_Calories' => '290 kcal',
            ],
            [
                'Food_Items' => 'Fish',
                'Breakfast' => '80g',
                'Lunch' => '100g',
                'Dinner' => '100g',
                'Total_Calories' => '215 kcal',
            ],
            [
                'Food_Items' => 'Vegetables',
                'Breakfast' => '125g',
                'Lunch' => '160g',
                'Dinner' => '160g',
                'Total_Calories' => '150 kcal',
            ],
            [
                'Food_Items' => 'Fruits',
                'Breakfast' => '120g',
                'Lunch' => '120g',
                'Dinner' => '120g',
                'Total_Calories' => '55 kcal',
            ],
            [
                'Food_Items' => 'Bread',
                'Breakfast' => '50g',
                'Lunch' => '40g',
                'Dinner' => '40g',
                'Total_Calories' => '125 kcal',
            ],
            [
                'Food_Items' => 'Milk',
                'Breakfast' => '150ml',
                'Lunch' => '-', 
                'Dinner' => '150ml',
                'Total_Calories' => '84 kcal',
            ],
            [
                'Food_Items' => 'Total Calories',
                'Breakfast' => '1260 kcal',
                'Lunch' => '580 kcal',
                'Dinner' => '1215 kcal',
                'Total_Calories' => '3055 kcal',
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
        Schema::dropIfExists('inc_diet_table7');
    }
};
