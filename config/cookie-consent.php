<?php

use Illuminate\Support\Str;

return [
    'cookie_key' => '__' . Str::slug(env('APP_NAME', 'netflex'), '_') . '_cookie_consent',
    'cookie_value_analytics' => 'analytics',
    'cookie_value_marketing' => 'marketing',
    'cookie_value_both' => 'both',
    'cookie_value_none' => 'none',
    'cookie_expiration_days' => '365',
    'gtm_event' => 'cookie_refresh',
    'ignored_paths' => ['/.well-known/*'],
    'policy_url_en' => env('COOKIE_POLICY_URL_EN', null),
    'policy_url_no' => env('COOKIE_POLICY_URL_NO', null),
];