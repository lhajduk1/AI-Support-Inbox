<?php

namespace App\Enums;

enum TicketMessageSenderType: string
{
    case CUSTOMER = 'customer';
    case AGENT = 'agent';
    case SYSTEM = 'system';
}
