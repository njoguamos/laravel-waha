# Profile Data DTO Reference

The `NjoguAmos\Waha\Dto\ProfileData` represents your WhatsApp profile information.

```php
use NjoguAmos\Waha\Facades\Profile;
use NjoguAmos\Waha\Dto\ProfileData;

$response = Profile::get(session: 'default');
/** @var ProfileData $profile */
$profile = $response->dtoOrFail();
```

## `id` → `string`

The WhatsApp ID of the profile.

```php
$profile->id; // "11111111111@c.us"
```

## `name` → `string`

The profile display name.

```php
$profile->name; // "My Name"
```

## `picture` → `string|null`

The profile picture URL. `null` if no picture is set.

```php
$profile->picture; // "https://pps.whatsapp.net/v/t/123.jpg?other-params" or null
```
