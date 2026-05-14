<?php

namespace App\Enums;

enum TicketStatus: string
{
    case OPEN = 'open';
    case PENDING = 'pending';
    case REOLVED = 'resolved';
    case CLOSED = 'closed';
}
