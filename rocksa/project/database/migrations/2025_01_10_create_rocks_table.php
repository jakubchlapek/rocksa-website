<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->string('main_mineral');
            $table->string('treatment');
            $table->string('country_of_origin');
            $table->float('weight');
            $table->float('density');
            $table->string('color');
            $table->string('clarity');
            $table->float('toughness');
            $table->string('rarity');
            $table->float('price');
            $table->longText('main_image')->nullable();
            $table->longText('image_1')->nullable();
            $table->longText('image_2')->nullable();
            $table->longText('image_3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rocks');
    }
};
