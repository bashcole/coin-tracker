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
        Schema::create('price_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pair_id')->nullable()->constrained('exchange_pairs');
            $table->unsignedDecimal('ask', 16, 8)->default(0);
            $table->unsignedDecimal('bid', 16, 8)->default(0);
            $table->datetime('created_at')->index();
            $table->datetime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('price_histories');
    }
};
