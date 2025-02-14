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
        Schema::create('registration_custom_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registration_step_id')->nullable()->constrained();
            $table->string('field_name')->nullable();
            $table->string('field_slug')->nullable();
            $table->string('field_type')->nullable();
            $table->boolean('required')->default(true);
            $table->longText('options')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration_custom_fields');
    }
};
