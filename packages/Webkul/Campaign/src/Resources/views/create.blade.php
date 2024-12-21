<x-admin::layouts>
    <x-slot:title>
        @lang('campaign::app.campaign.index.title')
        </x-slot>

        <form action="{{route("admin.campaign.save")}}" method="post">
            <div class="flex flex-col gap-4">
                <div class="flex items-center justify-between rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300">
                    <div class="flex flex-col gap-2">
                        <div class="flex cursor-pointer items-center">
                            <!-- Bredcrumbs -->
                            <x-admin::breadcrumbs name="campaign.create" />
                        </div>

                        <div class="text-xl font-bold dark:text-white">
                            @lang('campaign::app.campaign.create.title')
                        </div>
                    </div>

                    <div class="flex items-center gap-x-2.5">
                        <!-- Create button for Campaign -->
                        <div class="flex items-center gap-x-2.5">
                            <x-admin::button
                                class="primary-button"
                                :title="trans('campaign::app.campaign.create.save-btn')"
                            />
                        </div>
                    </div>
                </div>



                <div class="w-1/2 rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300">


                        {{--        name            --}}
                        <x-admin::form.control-group class="!mb-0">
                            <x-admin::form.control-group.label class="required">
                                @lang('campaign::app.campaign.create.name')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="name"
                                rules="required"
                                :label="trans('campaign::app.campaign.create.name')"
                            />

                            <x-admin::form.control-group.error control-name="comment" />
                        </x-admin::form.control-group>

                        {{--        Description            --}}
                        <x-admin::form.control-group class="!mb-0">
                            <x-admin::form.control-group.label class="required">
                                @lang('campaign::app.campaign.create.description')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="textarea"
                                name="description"
                                :label="trans('campaign::app.campaign.create.description')"
                            />

                            <x-admin::form.control-group.error control-name="comment" />
                        </x-admin::form.control-group>

                        {{--        type            --}}
                        <x-admin::form.control-group class="!mb-0">
                            <x-admin::form.control-group.label class="required">
                                @lang('campaign::app.campaign.create.type')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="select"
                                name="type"
                                id="type"
                                rules="required"
                                :label="trans('campaign::app.campaign.create.type')"
                                :placeholder="trans('campaign::app.campaign.create.type_description')"
                            >

                                @foreach (\Webkul\Campaign\Enums\CampaignType::toArray() as $key=>$user)
                                    <option value="{{ $key }}">
                                        @lang('campaign::app.campaign.type.'.$key)
                                    </option>
                                @endforeach

                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error control-name="permission_type" />
                        </x-admin::form.control-group>


                        {{--        Message            --}}
                        <x-admin::form.control-group class="!mb-0">
                            <x-admin::form.control-group.label class="required">
                                @lang('campaign::app.campaign.create.message')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="textarea"
                                name="message"
                                :label="trans('campaign::app.campaign.create.message')"
                            />

                            <x-admin::form.control-group.error control-name="comment" />
                        </x-admin::form.control-group>


                        {{--        status            --}}
                        <x-admin::form.control-group class="!mb-0">
                            <x-admin::form.control-group.label class="required">
                                @lang('campaign::app.campaign.create.status')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="select"
                                name="status"
                                id="status"
                                rules="required"
                                :label="trans('campaign::app.campaign.create.status')"
                                :placeholder="trans('campaign::app.campaign.create.status_description')"
                            >

                                @foreach (\Webkul\Campaign\Enums\CampaignStatus::toArray() as $key=>$user)
                                    <option value="{{ $key }}">
                                        @lang('campaign::app.campaign.status.'.$key)
                                    </option>
                                @endforeach

                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error control-name="permission_type" />
                        </x-admin::form.control-group>



                        {{--        start_date            --}}
                        <x-admin::form.control-group class="!mb-0">
                            <x-admin::form.control-group.label class="required">
                                @lang('campaign::app.campaign.create.start_date')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="date"
                                name="start_date"
                                id="start_date"
                                rules="required"
                                :label="trans('campaign::app.campaign.create.start_date')"
                                :placeholder="trans('campaign::app.campaign.create.start_date_description')"
                            > </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error control-name="permission_type" />
                        </x-admin::form.control-group>

                        {{--        end_date            --}}
                        <x-admin::form.control-group class="!mb-0">
                            <x-admin::form.control-group.label class="required">
                                @lang('campaign::app.campaign.create.end_date')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="date"
                                name="start_date"
                                id="start_date"
                                rules="required"
                                :label="trans('campaign::app.campaign.create.end_date')"
                                :placeholder="trans('campaign::app.campaign.create.end_date_description')"
                            > </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error control-name="permission_type" />
                        </x-admin::form.control-group>

                        <br>



                </div>
            </div>
        </form>

</x-admin::layouts>
