<?php

namespace App\Models;

use App\Enums\DraftReplyStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DraftReply extends Model
{
    protected $fillable = [
        'body',
        'status'
    ];

    protected function casts()
    {
        return [
            'status' => DraftReplyStatus::class
        ];
    }

    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }
}
