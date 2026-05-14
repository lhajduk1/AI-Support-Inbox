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
        Schema::create('ai_analyses', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(\App\Models\Ticket::class, 'ticket_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('category');
            $table->enum('priority', ['low', 'medium', 'high', 'urgent'])->default('low');
            $table->string('sentiment')->nullable();
            $table->text('summary');
            $table->float('confidence', 43);
            $table->json('raw_response');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ai_analyses');
    }
};
