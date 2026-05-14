<?php

namespace App\Enums;

enum DraftReplyStatus: string
{
    case DRAFT = 'draft';
    case ACCEPTED = 'accepted';
    case REJECTED = 'rejected';
}
