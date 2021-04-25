<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class RideStatus extends Enum
{
    const PENDING = 1;
    const CONFIRMED = 2;
    const COMPLETED = 3;
    const CANCELED = 4;
}
