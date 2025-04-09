<?php

return [
    "enabled" => env('SMSUKRAINE_ENABLED', false),
    "api_key" => env('SMSUKRAINE_API_KEY', ''),
    "name_sms" => env('SMSUKRAINE_SMS_NAME', ''),
    "name_viber" => env('SMSUKRAINE_VIBER_NAME', ''),
    "channel" => env('SMSUKRAINE_CHANNEL', 'sms'),
    "sms_on_fail" => env('SMSUKRAINE_RESEND_IF_VIBER_FAIL', 0),
    "priority" => env('SMSUKRAINE_PRIORITY', 1),
    "prefix" => env('SMSUKRAINE_PREFIX', "any"),
    "tags" => env('SMSUKRAINE_TAGS', '#smsukraine'),
    "default" => env('SMSUKRAINE_DEFAULT', false),
    "devmode" => env('SMSUKRAINE_DEVMODE', false),
];
