<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
public function up()
{
    Schema::create('incomes', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
        $table->string('title');
        $table->decimal('amount', 12, 2);
        $table->date('date');
        $table->boolean('is_recurring')->default(false);
        $table->string('frequency')->nullable();
        $table->text('description')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};
