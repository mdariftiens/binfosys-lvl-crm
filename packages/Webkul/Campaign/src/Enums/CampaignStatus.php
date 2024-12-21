<?php

namespace Webkul\Campaign\Enums;

use Konekt\Enum\Enum;

class CampaignStatus extends Enum
{
    const __DEFAULT = self::INACTIVE;
    const INACTIVE = 0;
    const ACTIVE = 1;
    const INPROGRESS = 2;
    const ONHOLD = 3;
    const STOPPED = 4;
    const FINISHED = 5;
}
