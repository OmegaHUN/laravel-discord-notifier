<?php

namespace Triztan\DiscordNotifier;

use Illuminate\Support\Facades\Http;
use Exception;

class DiscordNotifier
{
    public function send(string $message): bool
    {
        if (!config('discord-notifier.enabled', true)) {
            return false;
        }

        $webhookUrl = config('discord-notifier.webhook_url');

        if (empty($webhookUrl)) {
            throw new Exception('Discord Webhook URL is not configured.');
        }

        $response = Http::post($webhookUrl, [
            'content' => "🚨 **Laravel Alert:** " . $message,
        ]);

        return $response->successful();
    }
}