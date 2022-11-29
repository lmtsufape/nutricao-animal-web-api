<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->decimal('moisture')->nullable(true);   //?
            $table->decimal('energetic_value')->nullable(true);
            $table->decimal('protein_value')->nullable(true);
            $table->decimal('lipids')->nullable(true);
            $table->decimal('carbohydrates')->nullable(true);
            $table->decimal('calcium')->nullable(true);
            $table->decimal('fiber')->nullable(true);
            $table->enum('category',['portion'])->default('portion');
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foods');
    }
};
