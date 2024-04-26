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
        Schema::create('inc_diet_table8', function (Blueprint $table) {
            $table->string('Food_Items', 30);
            $table->string('Breakfast', 30);
            $table->string('Lunch', 30);
            $table->string('Dinner', 30);
            $table->string('Total_Calories', 30);
        });

        DB::table('inc_diet_table8')->insert([
            [
                'Food_Items' => 'Rice',
                'Breakfast' => '85g',
                'Lunch' => '85g',
                'Dinner' => '85g',
                'Total_Calories' => '325 kcal',
            ],
            [
                'Food_Items' => 'Lentils',
                'Breakfast' => '35g',
                'Lunch' => '55g',
                'Dinner' => '55g',
                'Total_Calories' => '175 kcal',
            ],
            [
                'Food_Items' => 'Fish',
                'Breakfast' => '55g',
                'Lunch' => '75g',
                'Dinner' => '75g',
                'Total_Calories' => '160 kcal',
            ],
            [
                'Food_Items' => 'Vegetables',
                'Breakfast' => '120g',
                'Lunch' => '130g',
                'Dinner' => '130g',
                'Total_Calories' => '165 kcal',
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
                'Total_Calories' => '85 kcal',
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
                'Breakfast' => '970 kcal',
                'Lunch' => '475 kcal',
                'Dinner' => '860 kcal',
                'Total_Calories' => '2305 kcal',
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
        Schema::dropIfExists('inc_diet_table8');
    }
};
