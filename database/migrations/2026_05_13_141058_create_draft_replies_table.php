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
        Schema::create('draft_replies', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(\App\Models\Ticket::class, 'ticket_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->text('body');
            $table->enum('status', ['draft', 'accepted', 'rejected'])->default('draft');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('draft_replies');
    }
};
