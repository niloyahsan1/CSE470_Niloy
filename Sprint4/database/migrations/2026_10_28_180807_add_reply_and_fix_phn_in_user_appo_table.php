<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('user_appo', function (Blueprint $table) {
            // Fix phn from integer to string (phone numbers aren't math)
            $table->string('phn', 20)->change();
            // Add consultant reply column
            $table->text('consultant_reply')->nullable()->after('msg');
        });
    }

    public function down(): void
    {
        Schema::table('user_appo', function (Blueprint $table) {
            $table->integer('phn')->change();
            $table->dropColumn('consultant_reply');
        });
    }
};
