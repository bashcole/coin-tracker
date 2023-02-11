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
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 32)->unique();
            $table->string('symbol', 8)->unique();
            $table->string('color', 128)->nullable();
            $table->unsignedTinyInteger('decimals');
            $table->boolean('prime')->default(0);
            $table->unsignedDecimal('market_cap', 16, 2)->nullable();
            $table->unsignedDecimal('circulating_supply', 16, 2)->nullable();
            $table->enum('type', ['crypto', 'fiat'])->index();
            $table->boolean('active')->default(1)->index();
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
        Schema::dropIfExists('currencies');
    }
};
