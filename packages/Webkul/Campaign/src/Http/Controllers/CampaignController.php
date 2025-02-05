<?php

namespace Webkul\Campaign\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\Campaign\DataGrids\PersonDataGrid;
use Webkul\Campaign\Http\Requests\CampaignRequest;
use Webkul\Campaign\Models\Campaign;
use Webkul\Campaign\Repositories\CampaignRepository;

class CampaignController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public CampaignRepository $campaignRepository;

    public function __construct(CampaignRepository $campaignRepository)
    {
        $this->campaignRepository = $campaignRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (request()->ajax()) {
            return datagrid(PersonDataGrid::class)->process();
        }

//        return view('admin::contacts.persons.index');
        return view('campaign::index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('campaign::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CampaignRequest $request)
    {
        $this->campaignRepository->create($request->validated());
        session()->flash('success', trans('Campaign created successfully.'));
        return redirect()->route('admin.campaign.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $campaign = Campaign::findOrFail($id);
        return view('campaign::edit', compact('campaign'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $campaign = Campaign::findOrFail($id);
        if (isset($campaign->package_id) && $campaign->package_id != $request->package_id) {
            $data = json_encode([
                'package_id' => $request->package_id,
                'company_id' => Auth::id(),
                'campain_id' => $campaign->id
            ]);
            $oldKey = "campaign_".Auth::id()."_".$id."_".$campaign->package_id;
            $newKey = "campaign_".Auth::id()."_".$campaign->id."_".$request->package_id;
            Redis::del($oldKey);
            Redis::set($newKey, $data);
        }
        Campaign::where('id', $id)->update($request->except('_token'));
        session()->flash('success', trans('admin::app.products.index.update-success'));
        return redirect()->route('admin.campaign.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id): JsonResponse
    {
        $Campaign = Campaign::findOrFail($id);
        try {
            $Campaign->delete($id);
            return response()->json([
                'message' => trans('Campaign deleted successfully.'),
            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => trans('Campaign cannot be deleted. Please, try again.'),
            ], 400);
        }
    }
    public function massDestroy(MassDestroyRequest $massDestroyRequest): \Illuminate\Http\JsonResponse
    {
        $campaign = Campaign::whereIn('id', $massDestroyRequest->input('indices'))->get();

        foreach ($campaign as $value) {
            DB::table('campaigns')->where('id', $value->id)->delete();
        }
        return response()->json([
            'message' => trans('Campains deleted successfully.'),
        ]);
    }
}
