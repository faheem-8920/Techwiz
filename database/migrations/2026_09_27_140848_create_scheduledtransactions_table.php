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
        Schema::create('scheduledtransactions', function (Blueprint $table) {
            $table->id();
               $table->foreignId('user_id')
        ->constrained('users')
        ->cascadeOnDelete();

    $table->foreignId('category_id')
        ->constrained('categories')
        ->cascadeOnDelete();

    $table->decimal('Amount', 10, 2);

    $table->text('Description')->nullable();

    $table->date('StartDate');

    $table->enum('Frequency', [
        'Daily',
        'Weekly',
        'Monthly',
        'Yearly'
    ]);

    $table->date('NextDate');

    $table->boolean('Status')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scheduledtransactions');
    }
};
