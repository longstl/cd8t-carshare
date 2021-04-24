<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class RideStatus extends Enum
{
    const PENDING = 1;
    const CONFIRMED = 2;
    const COMPLETED = 3;
    const CANCELED = 4;
}
