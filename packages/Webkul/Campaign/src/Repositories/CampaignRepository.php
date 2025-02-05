<?php

namespace Webkul\Campaign\Repositories;

use campaign\Events\ManageCampaignEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Webkul\Campaign\Models\Campaign;

class CampaignRepository
{
    public function show()
    {

    }

    public function create(array $fields)
    {
        $campaign = Campaign::create($fields);
        if ($campaign){
            $data = json_encode([
                'package_id' => $fields['package_id'],
                'company_id' => Auth::id(),
                'campain_id' => $campaign->id
            ]);
            $key = "campaign_".Auth::id()."_".$campaign->id."_".$fields['package_id'];
            Redis::set($key, $data);
        }

//        ManageCampaignEvent::dispatch($campaign,__FUNCTION__);
    }

    public function update(int $campaignId, array $fields)
    {
        $campaign = Campaign::firstOrFail($campaignId);
        $campaign->update($fields);

        ManageCampaignEvent::dispatch($campaign);
    }


    public function delete(int $campaignId)
    {
        $campaign = Campaign::destroy($campaignId);

        ManageCampaignEvent::dispatch($campaign,__FUNCTION__);
    }


}
