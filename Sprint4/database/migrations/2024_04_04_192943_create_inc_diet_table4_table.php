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
        Schema::create('inc_diet_table4', function (Blueprint $table) {
            $table->string('Food_Items', 30);
            $table->string('Breakfast', 30);
            $table->string('Lunch', 30);
            $table->string('Dinner', 30);
            $table->string('Total_Calories', 30);
        });

        DB::table('inc_diet_table4')->insert([
            [
                'Food_Items' => 'Rice',
                'Breakfast' => '130g',
                'Lunch' => '150g',
                'Dinner' => '155g',
                'Total_Calories' => '610 kcal',
            ],
            [
                'Food_Items' => 'Lentils',
                'Breakfast' => '70g',
                'Lunch' => '110g',
                'Dinner' => '105g',
                'Total_Calories' => '355 kcal',
            ],
            [
                'Food_Items' => 'Chicken',
                'Breakfast' => '110g',
                'Lunch' => '125g',
                'Dinner' => '125g',
                'Total_Calories' => '315 kcal',
            ],
            [
                'Food_Items' => 'Vegetables',
                'Breakfast' => '160g',
                'Lunch' => '210g',
                'Dinner' => '210g',
                'Total_Calories' => '205 kcal',
            ],
            [
                'Food_Items' => 'Fruits',
                'Breakfast' => '105g',
                'Lunch' => '105g',
                'Dinner' => '105g',
                'Total_Calories' => '55 kcal',
            ],
            [
                'Food_Items' => 'Bread',
                'Breakfast' => '66g',
                'Lunch' => '55g',
                'Dinner' => '55g',
                'Total_Calories' => '245 kcal',
            ],
            [
                'Food_Items' => 'Milk',
                'Breakfast' => '260ml',
                'Lunch' => '-', 
                'Dinner' => '200ml',
                'Total_Calories' => '145 kcal',
            ],
            [
                'Food_Items' => 'Total Calories',
                'Breakfast' => '1770 kcal',
                'Lunch' => '810 kcal',
                'Dinner' => '1550 kcal',
                'Total_Calories' => '4130 kcal',
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
        Schema::dropIfExists('inc_diet_table4');
    }
};
