<?php

/**
 * This is config for Infobip SMS.
 *
 * @see https://dev.infobip.com/send-sms/single-sms-message
 */
return [
    'from'     => env('INFOBIP_FROM', 'First Rays'),
    'username' => env('INFOBIP_USERNAME', 'FirstRays'),
    'password' => env('INFOBIP_PASSWORD', 'Arm@n3@jed'),
];
