# Push To Pushe

Send simple push notification by pushe service in laravel.

## Install

This package can be installed through Composer.

```bash
composer require journalctl/push-to-pushe
```

```bash
php artisan vendor:publish
```

## Config

Add your pushe `token` and `app_ids` to `config/push-to-pushe.php`.

```php
[
    'app_ids' => ['appId-1'],
    'token' => 'your-pushe-service-token',
]
```

## Usage

Add HasPushToPushe trait to your [user] model.

```php
use Journalctl\HasPushToPushe;

...

use HasPushToPushe;

..
```

## Save pushe ids

```php
use Journalctl\PushToPushe\PushToPushe;

...

$user->pusheIds()->save(new PushToPushe(['pushe_id' => 'your-client-pushe-id']));

...
```

## Send push notify

```php
$user->pushToPushe('First notify', 'The first push to pushe notification!');
```

## Contributing

Thank you for considering contributing to PushToPushe!

## License

The PushToPushe is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
