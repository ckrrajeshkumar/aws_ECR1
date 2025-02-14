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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string("confirmation_code")->nullable()->index();
            $table->foreignId('member_type_id')->nullable()->constrained();
            $table->foreignId('membership_id')->nullable()->constrained();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('valid_thru')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('roster_status')->default(1);
            $table->tinyInteger('card_refresh_status')->default(0);
            $table->string("tenant_id")->nullable();
            $table->foreign("tenant_id")->references("id")->on("tenants");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
