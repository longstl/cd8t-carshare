<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class RideRequestStatus extends Enum
{
    const WAITING =  1;
    const MATCHED =  2;
    const CANCELED = 3;
}
