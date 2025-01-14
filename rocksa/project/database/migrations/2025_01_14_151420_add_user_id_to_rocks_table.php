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
        Schema::table('rocks', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id'); // Dodanie kolumny user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Klucz obcy do tabeli users
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rocks', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Usunięcie klucza obcego
            $table->dropColumn('user_id'); // Usunięcie kolumny user_id
        });
    }
};
