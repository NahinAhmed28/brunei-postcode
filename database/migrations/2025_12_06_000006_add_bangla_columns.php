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
        Schema::table('districts', function (Blueprint $table) {
            $table->string('name_bn')->nullable()->after('name');
        });

        Schema::table('mukims', function (Blueprint $table) {
            $table->string('name_bn')->nullable()->after('name');
        });

        Schema::table('kampongs', function (Blueprint $table) {
            $table->string('name_bn')->nullable()->after('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kampongs', function (Blueprint $table) {
            $table->dropColumn('name_bn');
        });

        Schema::table('mukims', function (Blueprint $table) {
            $table->dropColumn('name_bn');
        });

        Schema::table('districts', function (Blueprint $table) {
            $table->dropColumn('name_bn');
        });
    }
};
