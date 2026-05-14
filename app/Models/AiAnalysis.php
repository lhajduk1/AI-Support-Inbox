<?php

namespace App\Models;

use App\Enums\AiAnalysisPriority;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Model;

class AiAnalysis extends Model
{
    protected $fillable = [
        'category',
        'priority',
        'sentiment',
        'summary',
        'confidence',
        'raw_response'
    ];

    protected function casts()
    {
        return [
            'priority' => AiAnalysisPriority::class,
            'confidence' => 'float',
            'raw_response' => 'array'
        ];
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
