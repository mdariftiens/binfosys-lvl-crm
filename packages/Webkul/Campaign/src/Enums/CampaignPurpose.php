<?php

namespace Webkul\Campaign\Enums;

use Konekt\Enum\Enum;

class CampaignPurpose extends Enum
{
    const __DEFAULT = self::SALES;
    const LeadsGeneration = 'Leads Generation';
    const Feedback = 'Feedback';
    const FOLLOWUP = 'Followup';
    const SALES = 'Sales';
}
