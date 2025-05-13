<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Make password nullable
            $table->string('password')->nullable()->change();

            // Add social login columns if they don't exist yet
            if (!Schema::hasColumn('users', 'provider')) {
                $table->string('provider')->nullable()->after('password');
            }

            if (!Schema::hasColumn('users', 'provider_id')) {
                $table->string('provider_id')->nullable()->after('provider');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Revert password to NOT nullable
            $table->string('password')->nullable(false)->change();

            // Drop the social login columns
            $table->dropColumn(['provider', 'provider_id']);
        });
    }
};
