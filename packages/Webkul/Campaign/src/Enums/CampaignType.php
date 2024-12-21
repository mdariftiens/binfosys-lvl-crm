<?php

namespace Webkul\Campaign\Enums;

use Konekt\Enum\Enum;

class CampaignType extends Enum
{
    const __DEFAULT = self::SMS;
    const SMS = 'sms';
    const WHATSUP = 'whatsup';
    const EMAIL = 'email';
    const MESSENGER = 'messenger';
}
