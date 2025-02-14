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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_type_id')->nullable()->constrained();
            $table->foreignId('membership_id')->nullable()->constrained();
            $table->double('cost')->default(0);
            $table->foreignId('coupon_id')->nullable()->constrained();
            $table->double('discount_amount')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->string('transaction_id')->nullable()->index();
            $table->dateTime('transaction_date')->nullable()->index();
            $table->string('customer_profile_id')->nullable();
            $table->string('payment_profile_id')->nullable();
            $table->dateTime('start_date')->nullable()->index();
            $table->dateTime('valid_thru')->nullable()->index();
            $table->foreignId('member_id')->nullable()->constrained();
            $table->longText('remarks')->nullable();
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
        Schema::dropIfExists('registrations');
    }
};
