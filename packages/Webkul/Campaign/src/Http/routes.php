<?php

Route::group([
        'prefix'        => 'admin/campaign',
        'middleware'    => ['web', 'user']
    ], function () {

        Route::get('', 'Webkul\Campaign\Http\Controllers\CampaignController@index')->name('admin.campaign.index');
        Route::get('create', 'Webkul\Campaign\Http\Controllers\CampaignController@create')->name('admin.campaign.create');
        Route::post('save', 'Webkul\Campaign\Http\Controllers\CampaignController@store')->name('admin.campaign.store');

});
