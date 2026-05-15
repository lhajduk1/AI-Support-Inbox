<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'ticket',
            'id' => $this->id,
            'attributes' => [
                'subject' => $this->subject,
                'status' => $this->status,
                'priority' => $this->priority,
                'category' => $this->category,
                'language' => $this->language,
                'aiProcessingStatus' => $this->ai_processing_status,
                'createdAt' => $this->created_at,
                'updatedAt' => $this->updated_at
            ],
            'relationships' => [
                'customer' => [
                    'type' => 'customer',
                    'id' => $this->customer_id
                ],
                'ticketMessages' => [
                    'type' => 'ticketMessages',
                    'id' => $this->id
                ]
            ],
            'links' => [
                ['self' => route('tickets.show', ['ticket' => $this->id])]
            ]
        ];
    }
}
