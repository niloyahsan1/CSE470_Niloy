<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bmi_under', function (Blueprint $table) {
            $table->string('Activity_Type', 30);
            $table->string('Duration', 30);
            $table->string('Frequency', 30);
            $table->string('Intensity', 30);
        });

        // Insert data into the table
        DB::table('bmi_under')->insert([
            [
                'Activity_Type' => 'Resistance Training',
                'Duration' => '30-45 minutes',
                'Frequency' => '2-3 days/week',
                'Intensity' => 'Moderate to High',
            ],
            [
                'Activity_Type' => 'Interval Training',
                'Duration' => '20-30 minutes',
                'Frequency' => '2-3 days/week',
                'Intensity' => 'High',
            ],
            [
                'Activity_Type' => 'Yoga/Pilates',
                'Duration' => '45-60 minutes',
                'Frequency' => '3-4 days/week',
                'Intensity' => 'Light to Moderate',
            ],
            [
                'Activity_Type' => 'Cycling',
                'Duration' => '45 minutes',
                'Frequency' => '3-4 days/week',
                'Intensity' => 'Moderate',
            ],
            [
                'Activity_Type' => 'Walking',
                'Duration' => '30-45 minutes',
                'Frequency' => '5-6 days/week',
                'Intensity' => 'Moderate',
            ],
            [
                'Activity_Type' => 'Resistance Training',
                'Duration' => '30-45 minutes',
                'Frequency' => '2-3 days/week',
                'Intensity' => 'Moderate to High',
            ],
            [
                'Activity_Type' => 'Intensity Interval Training',
                'Duration' => '20-30 minutes',
                'Frequency' => '2-3 days/week',
                'Intensity' => 'High',
            ],
            [
                'Activity_Type' => 'Yoga/Pilates',
                'Duration' => '45-60 minutes',
                'Frequency' => '3-4 days/week',
                'Intensity' => 'Light to Moderate',
            ],
            [
                'Activity_Type' => 'Cycling',
                'Duration' => '45 minutes',
                'Frequency' => '3-4 days/week',
                'Intensity' => 'Moderate',
            ],
            [
                'Activity_Type' => 'Walking',
                'Duration' => '30-45 minutes',
                'Frequency' => '5-6 days/week',
                'Intensity' => 'Moderate',
            ],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('bmi_under');
    }
};
