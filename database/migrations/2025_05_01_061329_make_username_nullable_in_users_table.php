<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Change the username column to allow NULL values
            $table->string('username')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Revert back - check your original migration for the exact definition
            // Assuming it was just NOT NULL before:
            $table->string('username')->nullable(false)->change();
        });
    }
};