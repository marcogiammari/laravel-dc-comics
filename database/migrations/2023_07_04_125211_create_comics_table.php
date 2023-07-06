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
        Schema::create('comics', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->text('description', 1000)->nullable();
            $table->text('thumb', 1000)->nullable();
            $table->float('price', 8, 2);
            $table->string('series', 50);
            $table->string('type', 50);
            $table->date('sale_date');
            $table->json('artists')->nullable();
            $table->json('writers')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comics');
    }
};
