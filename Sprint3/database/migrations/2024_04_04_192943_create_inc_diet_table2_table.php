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
        Schema::create('inc_diet_table2', function (Blueprint $table) {
            $table->string('Food_Items', 30);
            $table->string('Breakfast', 30);
            $table->string('Lunch', 30);
            $table->string('Dinner', 30);
            $table->string('Total_Calories', 30);
        });

        DB::table('inc_diet_table2')->insert([
            [
                'Food_Items' => 'Rice',
                'Breakfast' => '75g',
                'Lunch' => '100g',
                'Dinner' => '100g',
                'Total_Calories' => '450 kcal',
            ],
            [
                'Food_Items' => 'Lentils',
                'Breakfast' => '30g',
                'Lunch' => '45g',
                'Dinner' => '45g',
                'Total_Calories' => '150 kcal',
            ],
            [
                'Food_Items' => 'Chicken',
                'Breakfast' => '50g',
                'Lunch' => '60g',
                'Dinner' => '65g',
                'Total_Calories' => '170 kcal',
            ],
            [
                'Food_Items' => 'Vegetables',
                'Breakfast' => '75g',
                'Lunch' => '105g',
                'Dinner' => '100g',
                'Total_Calories' => '130 kcal',
            ],
            [
                'Food_Items' => 'Fruits',
                'Breakfast' => '110g',
                'Lunch' => '100g',
                'Dinner' => '90g',
                'Total_Calories' => '55 kcal',
            ],
            [
                'Food_Items' => 'Bread',
                'Breakfast' => '45g',
                'Lunch' => '36g',
                'Dinner' => '35g',
                'Total_Calories' => '85 kcal',
            ],
            [
                'Food_Items' => 'Milk',
                'Breakfast' => '100ml',
                'Lunch' => '-', 
                'Dinner' => '120ml',
                'Total_Calories' => '62 kcal',
            ],
            [
                'Food_Items' => 'Total Calories',
                'Breakfast' => '800 kcal',
                'Lunch' => '410 kcal',
                'Dinner' => '820 kcal',
                'Total_Calories' => '2035 kcal',
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
        Schema::dropIfExists('inc_diet_table2');
    }
};
