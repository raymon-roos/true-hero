<?php

declare(strict_types=1);

namespace App\Enums;

use App\Enums\Traits\HasValues;

enum HeroRating: string
{
    use HasValues;

    case C = 'C';
    case B = 'B';
    case A = 'A';
    case S = 'S';
}
