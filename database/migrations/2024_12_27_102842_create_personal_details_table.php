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
        Schema::create('personal_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->nullable()->constrained();
            $table->string('first_name')->nullable()->index();
            $table->string('middle_name')->nullable()->index();
            $table->string('last_name')->nullable()->index();
            $table->string('gender')->nullable()->index();
            $table->date('dob')->nullable()->index();
            $table->string('check_duplicate_string')->nullable()->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_details');
    }
};
