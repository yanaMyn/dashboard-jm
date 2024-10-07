<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('jamaah', function (Blueprint $table) {
            $table->string('name', 80);
            $table->string('status', 30);
            $table->text('address');
            $table->string('phone_number', 20);
            $table->text('note');
            $table->string('gender', 15);
            $table->string('generus', 25);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jamaah', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('status');
            $table->dropColumn('address');
            $table->dropColumn('phone_number');
            $table->dropColumn('note');
            $table->dropColumn('gender');
            $table->dropColumn('generus');
        });
    }
};
