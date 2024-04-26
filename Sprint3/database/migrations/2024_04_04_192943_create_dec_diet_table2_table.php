
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
        Schema::create('dec_diet_table2', function (Blueprint $table) {
            $table->string('Food_Items', 30);
            $table->string('Breakfast', 30);
            $table->string('Lunch', 30);
            $table->string('Dinner', 30);
            $table->string('Total_Calories', 30);
        });

        DB::table('dec_diet_table2')->insert([
            [
                'Food_Items' => 'Rice',
                'Breakfast' => '80g',
                'Lunch' => '100g',
                'Dinner' => '100g',
                'Total_Calories' => '393 kcal',
            ],
            [
                'Food_Items' => 'Lentils',
                'Breakfast' => '30g',
                'Lunch' => '50g',
                'Dinner' => '50g',
                'Total_Calories' => '164 kcal',
            ],
            [
                'Food_Items' => 'Chicken',
                'Breakfast' => '50g',
                'Lunch' => '70g',
                'Dinner' => '70g',
                'Total_Calories' => '178 kcal',
            ],
            [
                'Food_Items' => 'Vegetables',
                'Breakfast' => '80g',
                'Lunch' => '100g',
                'Dinner' => '100g',
                'Total_Calories' => '92 kcal',
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
                'Breakfast' => '40g',
                'Lunch' => '30g',
                'Dinner' => '30g',
                'Total_Calories' => '119 kcal',
            ],
            [
                'Food_Items' => 'Milk',
                'Breakfast' => '150ml',
                'Lunch' => '-', 
                'Dinner' => '150ml',
                'Total_Calories' => '84 kcal',
            ],
            [
                'Food_Items' => 'Total Calories (kcal)',
                'Breakfast' => '1077 kcal',
                'Lunch' => '550 kcal',
                'Dinner' => '975 kcal',
                'Total_Calories' => '2602 kcal',
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
        Schema::dropIfExists('dec_diet_table2');
    }
};
