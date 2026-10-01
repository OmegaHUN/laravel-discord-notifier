<?php

return [
    /*
     * The Discord Webhook URL where notifications will be sent.
     */
    'webhook_url' => env('DISCORD_WEBHOOK_URL', ''),

    /*
     * Enable or disable the notification dispatcher globally.
     */
    'enabled' => env('DISCORD_NOTIFIER_ENABLED', true),
];