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
        Schema::create('inc_diet_table5', function (Blueprint $table) {
            $table->string('Food_Items', 30);
            $table->string('Breakfast', 30);
            $table->string('Lunch', 30);
            $table->string('Dinner', 30);
            $table->string('Total_Calories', 30);
        });

        DB::table('inc_diet_table5')->insert([
            [
                'Food_Items' => 'Brown Bread (2 slices)',
                'Breakfast' => '60g',
                'Lunch' => '-',
                'Dinner' => '60g',
                'Total_Calories' => '185 kcal',
            ],
            [
                'Food_Items' => 'Egg (1 large)',
                'Breakfast' => '50g',
                'Lunch' => '-',
                'Dinner' => '-',
                'Total_Calories' => '78 kcal',
            ],
            [
                'Food_Items' => 'Paratha (1 piece)',
                'Breakfast' => '-',
                'Lunch' => '50g',
                'Dinner' => '50g',
                'Total_Calories' => '300 kcal',
            ],
            [
                'Food_Items' => 'Chicken',
                'Breakfast' => '-',
                'Lunch' => '120g',
                'Dinner' => '120g',
                'Total_Calories' => '170 kcal',
            ],
            [
                'Food_Items' => 'Fish',
                'Breakfast' => '-',
                'Lunch' => '-',
                'Dinner' => '120g',
                'Total_Calories' => '128 kcal',
            ],
            [
                'Food_Items' => 'Rice (1 cup)',
                'Breakfast' => '-',
                'Lunch' => '160g',
                'Dinner' => '160g',
                'Total_Calories' => '215 kcal',
            ],
            [
                'Food_Items' => 'Lentil Soup (1 cup)',
                'Breakfast' => '100g',
                'Lunch' => '-',
                'Dinner' => '-',
                'Total_Calories' => '128 kcal',
            ],
            [
                'Food_Items' => 'Mixed Vegetable',
                'Breakfast' => '-',
                'Lunch' => '130g',
                'Dinner' => '130g',
                'Total_Calories' => '65 kcal',
            ],
            [
                'Food_Items' => 'Salad (1 cup)',
                'Breakfast' => '60g',
                'Lunch' => '60g',
                'Dinner' => '60g',
                'Total_Calories' => '30 kcal',
            ],
            [
                'Food_Items' => 'Tea/Coffee (1 cup)',
                'Breakfast' => '50g',
                'Lunch' => '50g',
                'Dinner' => '50g',
                'Total_Calories' => '25 kcal',
            ],
            [
                'Food_Items' => 'Total Calories',
                'Breakfast' => '270 kcal',
                'Lunch' => '465 kcal',
                'Dinner' => '690 kcal',
                'Total_Calories' => '1425 kcal',
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
        Schema::dropIfExists('inc_diet_table5');
    }
};
