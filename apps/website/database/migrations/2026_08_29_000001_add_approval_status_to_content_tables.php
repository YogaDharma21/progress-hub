<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('approval_status')->default('approved')->after('created_by');
            $table->text('rejection_reason')->nullable()->after('approval_status');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->string('approval_status')->default('approved')->after('created_by');
            $table->text('rejection_reason')->nullable()->after('approval_status');
        });

        Schema::table('resources', function (Blueprint $table) {
            $table->string('approval_status')->default('approved')->after('created_by');
            $table->text('rejection_reason')->nullable()->after('approval_status');
        });
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['approval_status', 'rejection_reason']);
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['approval_status', 'rejection_reason']);
        });

        Schema::table('resources', function (Blueprint $table) {
            $table->dropColumn(['approval_status', 'rejection_reason']);
        });
    }
};
