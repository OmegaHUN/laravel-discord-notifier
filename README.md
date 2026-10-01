# Laravel Discord Notifier

[![Latest Version on Packagist](https://img.shields.io/packagist/v/triztan/laravel-discord-notifier.svg?style=flat-square)](https://packagist.org/packages/triztan/laravel-discord-notifier)
[![License](https://img.shields.io/packagist/l/triztan/laravel-discord-notifier.svg?style=flat-square)](https://packagist.org/packages/triztan/laravel-discord-notifier)

A lightweight, zero-dependency Laravel package to instantly dispatch error logs, exceptions, and system notifications directly to your Discord channel via Webhook.

---

## Installation

You can install the package via composer into your local development or production project:

\`\`\`bash
composer require triztan/laravel-discord-notifier
\`\`\`

Publish the configuration file using Artisan:

\`\`\`bash
php artisan vendor:publish --tag="discord-config"
\`\`\`

Add your Discord Webhook URL to your application's \`.env\` file:

\`\`\`env
DISCORD_WEBHOOK_URL=https://discord.com/api/webhooks/your-webhook-id/your-webhook-token
DISCORD_NOTIFIER_ENABLED=true
\`\`\`

---

## Usage

You can easily send custom messages anywhere in your Laravel application using the Facade:

\`\`\`php
use Triztan\DiscordNotifier\Facades\Discord;

// Send a simple notification
Discord::send('User signup failed due to a database timeout!');
\`\`\`

### Integrating with Laravel Exception Handler (`bootstrap/app.php` or `app/Exceptions/Handler.php`)

To automatically catch and report critical application exceptions to Discord:

\`\`\`php
use Triztan\DiscordNotifier\Facades\Discord;
use Throwable;

// Inside your reportable callback:
$this->reportable(function (Throwable $e) {
    Discord::send("Critical Error: " . $e->getMessage() . " in " . $e->getFile() . ":" . $e->getLine());
});
\`\`\`

---

## Testing

To run the package tests locally:

\`\`\`bash
vendor/bin/phpunit
\`\`\`

---

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

---

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.