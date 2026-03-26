# Handling Response

Since **Laravel WAHA** is built on top of [Saloon PHP](https://docs.saloon.dev/), handling responses from the API is straightforward as they are returned as an instance of `Saloon\Http\Response`. This provides a consistent and powerful way to interact with the results of your API calls.

## Basic Usage

When you make a call using a facade or the `Waha` class, you'll receive a `Response` object. You can use this object to check the status of the request, access the response body, and more.

```php
use NjoguAmos\Waha\Facades\Status;
use NjoguAmos\Waha\Dto\TextStatusData;

$statusData = new TextStatusData(
    text: 'Hello from Laravel WAHA!',
    backgroundColor: '#38b42f',
    font: 1
);

$response = Status::sendText(session: 'default', data: $statusData);

// Check if the request was successful (2xx status code)
if ($response->successful()) {
    // Access the response body as an array
    $data = $response->json();
}
```

## Status Methods

The `Response` object provides several methods to check the HTTP status code:

```php
$response->status(); // Get the status code (e.g., 200)
$response->successful(); // true if status is 2xx
$response->failed(); // true if status is 4xx or 5xx
$response->clientError(); // true if status is 4xx
$response->serverError(); // true if status is 5xx
```

## Accessing the Body

You can access the response body in various formats:

```php
$response->body(); // Get the raw response body as a string
$response->json(); // Get the response body as an array (decoded from JSON)
$response->object(); // Get the response body as an object
$response->collect(); // Get the response body as a Laravel Collection
```

### JSON Access

If the response is JSON, you can access keys directly using the `json()` method with a key name:

```php
$id = $response->json('id');
```

## Throwing Exceptions

If you want to automatically throw an exception when a request fails (4xx or 5xx status code), you can use the `throw()` method:

```php
$response = Status::sendText(session: 'default', data: $statusData)->throw();
```

## DTO Transformation

Some endpoints in this package support automatic transformation of the response into a Data Transfer Object (DTO). If an endpoint supports this, it will be documented on that specific endpoint page.

When supported, you can use the `dto()` or `dtoOrFail()` methods on the response.

```php
use NjoguAmos\Waha\Facades\Sessions;

$response = Sessions::getMe(session: 'default');

// Returns a SessionMeData object or null if it fails
$me = $response->dto();

// Returns a SessionMeData object or throws an exception if it fails
$me = $response->dtoOrFail();
```

## Handling Errors

Laravel WAHA uses [Saloon exceptions](https://docs.saloon.dev/the-basics/exceptions) to handle request failures. You can catch these exceptions to handle errors gracefully in your application.

### Example: Handling Errors

You can catch [Saloon exceptions](https://docs.saloon.dev/the-basics/exceptions) to handle request failures and use the `json()` or `dtoOrFail()` methods to handle the response data.

::: code-group
```php [JSON Response]
use NjoguAmos\Waha\Facades\Sessions;
use Saloon\Exceptions\Request\RequestException;

try {
    $response = Sessions::getMe(session: 'default')->throw();
    $data = $response->json();
} catch (RequestException $e) {
    // Handle error (4xx or 5xx)
    $error = $e->getResponse()->json('message');
}
```

```php [DTO Transformation]
use NjoguAmos\Waha\Facades\Sessions;
use Saloon\Exceptions\Request\RequestException;

try {
    $me = Sessions::getMe(session: 'default')->dtoOrFail();
    // $me is an instance of SessionMeData
} catch (RequestException $e) {
    // Handle error (4xx or 5xx)
    $error = $e->getResponse()->json('message');
}
```
:::

### Common API Errors

The WAHA API may return errors in several scenarios, typically related to engine limitations or core vs. plus version restrictions.

- **404 Not Found**: Often occurs when a feature is disabled via environment variables (e.g., `WAHA_DEBUG_MODE=False`) or when a session/resource does not exist.
- **422 Unprocessable Entity**: Usually indicates that a feature is restricted to the **WAHA PLUS** version or is not supported by the current engine (e.g., creating multiple sessions on WAHA Core).
- **500 Internal Server Error**: Can occur if the underlying WhatsApp engine encounters an unexpected error.

### Engine and Version Limitations

Some features in WAHA are only available for specific engines (WEBJS, WPP, NOWEB, GOWS) or require the **WAHA PLUS** version. If you attempt to use a restricted feature, the API will return a `422 Unprocessable Entity` response with a message explaining the limitation.

For example, attempting to create a session other than `default` on **WAHA Core** or using the `health` check endpoint on the Core version will result in a 422 error.

Always check the **Engines** table at the bottom of each endpoint's documentation page to ensure compatibility with your environment.

For more advanced response handling features like headers and cookies, please refer to the [Saloon Response Documentation](https://docs.saloon.dev/the-basics/responses).
