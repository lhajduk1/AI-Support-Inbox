<?php

namespace App\Models;

use App\Enums\TicketMessageSenderType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TicketMessage extends Model
{
    protected $fillable = [
        'sender_type',
        'body',
    ];

    protected function casts()
    {
        return [
            'sender_type' => TicketMessageSenderType::class
        ];
    }

    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }
}
