<?php

namespace App\Jobs;

use App\Enums\TicketAiProcessingStatus;
use App\Models\Ticket;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProcessTicketWithAi implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public Ticket $ticket
    ) {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Make service call
        $this->ticket->update([
            'ai_processing_status' => TicketAiProcessingStatus::PROCESSING
        ]);
    }
}
