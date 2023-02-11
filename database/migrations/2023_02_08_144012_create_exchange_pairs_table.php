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
        Schema::create('exchange_pairs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exchange_id')->constrained('exchanges');
            $table->foreignId('base_currency_id')->constrained('currencies');
            $table->foreignId('quote_currency_id')->constrained('currencies');
            $table->string('symbol', 16)->unique()->comment('Internal pair symbol');
            $table->string('exchange_symbol', 16)->nullable()->comment('External pair symbol');

            $table->unsignedDecimal('ask', 16, 8)->default(0)->comment('Last exchange pair ask price');
            $table->unsignedDecimal('bid', 16, 8)->default(0)->comment('Last exchange pair bid price');
            $table->unsignedInteger('ordering');
            $table->datetime('created_at');
            $table->datetime('updated_at')->nullable();
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exchange_pairs');
    }
};
