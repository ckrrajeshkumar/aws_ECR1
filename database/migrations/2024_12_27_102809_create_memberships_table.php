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
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->foreignId('member_type_id')->nullable()->constrained();
            $table->double('price')->default(0);
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('memberships');
    }
};
