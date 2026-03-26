# Contact Update Data DTO Reference

The `NjoguAmos\Waha\Dto\ContactUpdateData` represents the data needed to update a contact on your phone address book.

```php
use NjoguAmos\Waha\Dto\ContactUpdateData;

$data = new ContactUpdateData(firstName: 'John', lastName: 'Doe');
```

## `firstName` → `string`

The contact's first name.

```php
$data->firstName; // "John"
```

## `lastName` → `string`

The contact's last name.

```php
$data->lastName; // "Doe"
```

## `toArray()`

Convert the DTO to an array for the API request body.

```php
$data->toArray();
// ["firstName" => "John", "lastName" => "Doe"]
```
