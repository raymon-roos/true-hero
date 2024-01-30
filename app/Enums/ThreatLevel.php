<?php

declare(strict_types=1);

namespace App\Enums;

use App\Enums\Traits\HasValues;

enum ThreatLevel: string
{
    use HasValues;

    case wolf = 'wolf';
    case tiger = 'tiger';
    case demon = 'demon';
    case dragon = 'dragon';
    case god = 'god';
}

