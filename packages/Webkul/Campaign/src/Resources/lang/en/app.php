<?php


return [

    'campaign' => [
        'index' => [
            'title' => 'Campaign',
            'create-btn' => 'Create Campaign',
            'create-success' => 'Campaign created successfully.',
            'update-success' => 'Campaign updated successfully.',
            'delete-success' => 'Campaign deleted successfully.',
            'delete-failed' => 'Campaign can not be deleted.',
        ],

        'create' => [
            'title' => 'Create Campaign',
            'name' => 'Name',
            'name_description' => 'Campaign Name',

            'type' => 'Type',
            'type_description' => 'Campaign Type',

            'description' => 'Description',
            'description_description' => 'Campaign Description',

            'message' => 'Message',
            'message_description' => 'Campaign Message to be sent',

            'status' => 'status',
            'status_description' => 'Campaign status',

            'start_date' => 'Start Date',
            'start_date_description' => 'Campaign Start Date',

            'end_date' => 'End Date',
            'end_date_description' => 'Campaign End Date',

            'budget' => 'Budget',
            'budget_description' => 'Campaign Budget',

            'total_message_to_be_sent' => 'total message to be sent',
            'total_message_to_be_sent_description' => 'Campaign total message to be sent',

            'total_message_sent' => 'total message sent',
            'total_message_sent_description' => 'Campaign total message sent',

            'purpose' => 'Purpose',
            'purpose_description' => 'Campaign purpose',

            'priority' => 'Priority',
            'priority_description' => 'Campaign priority',

            'save-btn' => 'Save Campaign',
            'action' => 'Action',
        ],

        'type' => [
            "SMS" => "SMS",
            "WHATSUP" => "Whatsup",
            "EMAIL" => "Email",
            "MESSENGER" => "Messenger",
        ],

        'status' =>[
            "INACTIVE" => 'In-Active',
            "ACTIVE" => 'Active',
            "INPROGRESS" => 'In-Progress',
            "ONHOLD" => 'On Hold',
            "STOPPED" => 'Stopped',
            "FINISHED" => 'Finished',
        ]
    ],

];
