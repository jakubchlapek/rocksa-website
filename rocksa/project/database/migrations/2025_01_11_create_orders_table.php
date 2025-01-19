<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('status')->default('new');
            $table->string('first_name'); // First name of the customer
            $table->string('last_name'); // Last name of the customer
            $table->string('street'); // Street address
            $table->string('city'); // City of the customer
            $table->string('postal_code'); // Postal code
            $table->string('phone_number'); // Customer's phone number
            $table->string('email'); // Customer's email address
            $table->decimal('total');
            $table->timestamps(); // Created at & updated at timestamp
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

