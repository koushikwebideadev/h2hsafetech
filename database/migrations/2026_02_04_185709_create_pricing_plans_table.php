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
        Schema::create('pricing_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., "FREE", "STANDARD SECURITY"
            $table->string('slug')->unique(); // e.g., "free", "standard-security"
            $table->string('badge_color')->nullable(); // e.g., "bg-free", "bg-security"
            $table->string('button_color')->nullable(); // e.g., "btn-success", "btn-warning"
            $table->string('button_text')->default('Get Started Now');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricing_plans');
    }
};
