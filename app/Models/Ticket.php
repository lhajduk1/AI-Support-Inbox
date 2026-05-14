<?php

namespace App\Models;

use App\Enums\{TicketStatus, TicketPriority, TicketAiProcessingStatus};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany, BelongsToMany};

class Ticket extends Model
{
    protected $fillable = [
        'subject',
        'status',
        'priority',
        'category',
        'language',
        'ai_processing_status',
    ];

    protected function casts()
    {
        return [
            'status' => TicketStatus::class,
            'priority' => TicketPriority::class,
            'ai_processing_status' => TicketAiProcessingStatus::class
        ];
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function aiAnalyses(): HasMany
    {
        return $this->hasMany(AiAnalysis::class);
    }

    public function draftReplies(): HasMany
    {
        return $this->hasMany(DraftReply::class);
    }
}
