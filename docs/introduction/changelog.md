# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [0.1.0-beta.1] - 2026-03-16

### Added
- Initial release of Laravel WAHA package.
- `Status` endpoint with support for:
    - `sendText()`: Send a text status update.
    - `sendImage()`: Send an image status update.
- `Contacts` endpoint with support for:
    - `checkExists()`: Check if a phone number exists on WhatsApp.
- DTOs for structured data:
    - `TextStatusData`
    - `ImageStatusData`
- Saloon PHP integration for API requests.
- Laravel Service Provider and Facades.
- Documentation built with VitePress.
