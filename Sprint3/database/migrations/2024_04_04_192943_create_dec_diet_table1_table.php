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
        Schema::create('dec_diet_table1', function (Blueprint $table) {
            $table->string('Food Items', 30);
            $table->string('Breakfast', 30);
            $table->string('Lunch', 30);
            $table->string('Dinner', 30);
            $table->string('Total Calories', 30);
        });

        DB::table('dec_diet_table1')->insert([
            [
                'Food Items' => 'Rice',
                'Breakfast' => '60g',
                'Lunch' => '80g',
                'Dinner' => '80g',
                'Total Calories' => '314 kcal',
            ],
            [
                'Food Items' => 'Lentils',
                'Breakfast' => '20g',
                'Lunch' => '30g',
                'Dinner' => '30g',
                'Total Calories' => '99 kcal',
            ],
            [
                'Food Items' => 'Chicken',
                'Breakfast' => '30g',
                'Lunch' => '40g',
                'Dinner' => '40g',
                'Total Calories' => '102 kcal',
            ],
            [
                'Food Items' => 'Vegetables',
                'Breakfast' => '50g',
                'Lunch' => '80g',
                'Dinner' => '80g',
                'Total Calories' => '74 kcal',
            ],
            [
                'Food Items' => 'Fruits',
                'Breakfast' => '100g',
                'Lunch' => '100g',
                'Dinner' => '100g',
                'Total Calories' => '47 kcal',
            ],
            [
                'Food Items' => 'Bread',
                'Breakfast' => '30g',
                'Lunch' => '20g',
                'Dinner' => '20g',
                'Total Calories' => '75 kcal',
            ],
            [
                'Food Items' => 'Milk',
                'Breakfast' => '100ml',
                'Lunch' => '-',
                'Dinner' => '100ml',
                'Total Calories' => '56 kcal',
            ],
            [
                'Food Items' => 'Total Calories (kcal)',
                'Breakfast' => '723 kcal',
                'Lunch' => '330 kcal',
                'Dinner' => '771 kcal',
                'Total Calories' => '1824 kcal',
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
        Schema::dropIfExists('dec_diet_table1');
    }
};
