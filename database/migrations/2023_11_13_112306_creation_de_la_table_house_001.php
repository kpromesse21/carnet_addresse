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
        Schema::create("houses", function (Blueprint $table) {
            
            $table->id();
            $table->string('name');
            $table->string('adresse')->nullable(false);
            // $table->
            $table->foreignId('user_id')->constrained(
                table: 'users', indexName: 'users_house_id')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
