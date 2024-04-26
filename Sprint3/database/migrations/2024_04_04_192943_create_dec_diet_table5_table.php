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
        Schema::create('dec_diet_table5', function (Blueprint $table) {
            $table->string('Food_Items', 30);
            $table->string('Breakfast', 30);
            $table->string('Lunch', 30);
            $table->string('Dinner', 30);
            $table->string('Total_Calories', 30);
        });

        DB::table('dec_diet_table5')->insert([
            [
                'Food_Items' => 'Brown Bread (2 slices)',
                'Breakfast' => '50g',
                'Lunch' => '-', 
                'Dinner' => '50g',
                'Total_Calories' => '175 kcal',
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
                'Food_Items' => 'Chicken (100g)',
                'Breakfast' => '-',
                'Lunch' => '100g',
                'Dinner' => '100g',
                'Total_Calories' => '165 kcal',
            ],
            [
                'Food_Items' => 'Fish (100g)',
                'Breakfast' => '-',
                'Lunch' => '-',
                'Dinner' => '100g',
                'Total_Calories' => '126 kcal',
            ],
            [
                'Food_Items' => 'Rice (1 cup)',
                'Breakfast' => '-',
                'Lunch' => '150g',
                'Dinner' => '150g',
                'Total_Calories' => '206 kcal',
            ],
            [
                'Food_Items' => 'Lentil Soup (1 cup)',
                'Breakfast' => '100g',
                'Lunch' => '-',
                'Dinner' => '-',
                'Total_Calories' => '128 kcal',
            ],
            [
                'Food_Items' => 'Mixed Vegetable (1 cup)',
                'Breakfast' => '-',
                'Lunch' => '100g',
                'Dinner' => '100g',
                'Total_Calories' => '50 kcal',
            ],
            [
                'Food_Items' => 'Salad (1 cup)',
                'Breakfast' => '50g',
                'Lunch' => '50g',
                'Dinner' => '50g',
                'Total_Calories' => '25 kcal',
            ],
            [
                'Food_Items' => 'Tea/Coffee (1 cup)',
                'Breakfast' => '50g',
                'Lunch' => '50g',
                'Dinner' => '50g',
                'Total_Calories' => '15 kcal',
            ],
            [
                'Food_Items' => 'Total Calories',
                'Breakfast' => '250 kcal',
                'Lunch' => '450 kcal',
                'Dinner' => '650 kcal',
                'Total_Calories' => '1248 kcal',
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
        Schema::dropIfExists('dec_diet_table5');
    }
};
