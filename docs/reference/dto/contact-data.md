# Contact Data DTO Reference

The `NjoguAmos\Waha\Dto\ContactData` represents a contact returned from the WAHA API.

```php
use NjoguAmos\Waha\Facades\Contact;
use NjoguAmos\Waha\Dto\ContactData;

$response = Contact::all();
$contacts = $response->dtoOrFail(); // ContactData[]
```

## `id` → `string|null`

The contact's WhatsApp ID (chat ID).

```php
$contact->id; // "11231231231@c.us"
```

## `number` → `string|null`

The contact's phone number.

```php
$contact->number; // "11231231231"
```

## `name` → `string|null`

The contact's display name.

```php
$contact->name; // "Contact Name"
```

## `pushname` → `string|null`

The contact's push name (username set by the contact).

```php
$contact->pushname; // "Pushname"
```

## `shortName` → `string|null`

The contact's short name.

```php
$contact->shortName; // "Shortname"
```

## `isMe` → `bool|null`

Whether this contact is the authenticated user.

```php
$contact->isMe; // true
```

## `isGroup` → `bool|null`

Whether this contact is a group.

```php
$contact->isGroup; // false
```

## `isWAContact` → `bool|null`

Whether this contact is a WhatsApp user.

```php
$contact->isWAContact; // true
```

## `isMyContact` → `bool|null`

Whether this contact is in the authenticated user's contact list.

```php
$contact->isMyContact; // true
```

## `isBlocked` → `bool|null`

Whether this contact is blocked.

```php
$contact->isBlocked; // false
```

::: tip
All fields are nullable. Some fields may not be present in the API response, in which case they will be `null`.
:::
