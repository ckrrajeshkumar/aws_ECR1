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
        Schema::create('registration_custom_field_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->nullable()->constrained();
            $table->foreignId('registration_id')->nullable()->constrained();
            $table->foreignId('field_id')->nullable()->constrained('registration_custom_fields');
            $table->longText('field_value')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration_custom_field_values');
    }
};
