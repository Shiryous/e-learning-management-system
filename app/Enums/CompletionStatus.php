<?php

namespace App\Enums;

enum CompletionStatus: string
{
    case COMPLETED = 'completed';
    case ENROLLED = 'enrolled'; 
    case FAILED = 'failed';
}
