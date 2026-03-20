# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [0.1.0-beta.8] - 2026-03-20

### Added
- `App` module for managing third-party applications:
  - `all()`: List all applications for a session.
  - `create()`: Create a new application.
  - `update()`: Update an existing application.
  - `delete()`: Delete an application.
- New methods to `Contact` endpoint:
  - `allLids()`: List all LIDs (LinkedIn Identifiers).
  - `getLid()`: Get LID for a phone number.
  - `getPhoneNumber()`: Get phone number for an LID.
  - `lidCount()`: Get total count of LIDs.
  - `getAbout()`: Get about information for a contact.
  - `getProfilePicture()`: Get profile picture URL for a contact.
  - `block()`: Block a contact.
  - `unblock()`: Unblock a contact.
- New `AppData`, `LidData`, and `PhoneNumberData` DTOs.
- `AppType` Enum for application types (Chatwoot, Calls).

### Changed
- Moved `deleteApp()` from `Session` endpoint to `App` endpoint.
- Renamed `checkExists()` to `exists()` in `Contact` endpoint.

## [0.1.0-beta.7] - 2026-03-19

### Added
- `Observability` endpoint with support for:
  - `health()`: Check server health.
  - `ping()`: Ping the server.
  - `version()`: Get server version.
  - `status()`: Get server status.
  - `environment()`: Get server environment variables.
  - `stop()`: Stop/Restart the server.
  - `heapSnapshot()`: Get Node.js heap snapshot.
  - `cpuProfile()`: Get Node.js CPU profile.
  - `browserTrace()`: Get browser trace for a session.
- New methods to `Session` endpoint:
  - `create()`: Create a new session.
  - `update()`: Update session configuration.
  - `delete()`: Delete a session.
  - `me()`: Get information about the authenticated user.
  - `logout()`: Logout from a session.
  - `restart()`: Restart a session.
  - `screenshot()`: Take a screenshot of the session.
  - `stop()`: Stop a session.
  - `deleteApp()`: Delete a specific app from the session.
- New `SessionCreateData` and `SessionUpdateData` DTOs.

### Changed
- Improved documentation with response handling guides and better API reference structure.
- Updated OpenAPI specification.
- Refined `SessionData` DTO.

## [0.1.0-beta.6] - 2026-03-19

### Added
- `Session` endpoint with new methods:
  - `get()`: Retrieve details for a specific session.
  - `all()`: List all sessions.
- `SessionStatus` Enum to represent session states (starting, scanning, working, failed, etc.).
- New `SessionData` DTO for structured session information.

### Changed
- Improved `SessionData` DTO with more robust data handling and type safety.

## [0.1.0-beta.5] - 2026-03-18

### Added
- Enforced **Pest PHP** for all tests and clarified usage of the base `TestCase`.

### Changed
- Improved presence status resilience and logging for better reliability.

## [0.1.0-beta.4] - 2026-03-18

### Added
- Support for `sendText()` with refined endpoint handling.
- Enhanced default typing status configuration.

### Changed
- Updated AI development guidelines (AGENTS.md).

## [0.1.0-beta.3] - 2026-03-18

### Added
- `Message` endpoint with support for:
  - `sendText()`: Send a text message with optional reply, mentions, and link preview support.
  - `sendSeen()`: Send a read receipt for a chat or specific messages.
- `Presence` endpoint with `setPresence()` method and `Presence` Enum (online, offline, typing, recording, paused).
- Human-like presence simulation for `sendText()` with configurable typing/paused signals and random delays.
- New `PresenceData`, `MessageTextData`, and `SeenData` DTOs.
- `send_typing_status` configuration in `config/waha.php`.

### Changed
- Improved URL safety by encoding session IDs in all API request endpoints using `rawurlencode()`.
- Standardized documentation heading hierarchies and navigation labels.
- Optimized DTOs by removing unused `fromArray()` methods.
- Refactored `SendTextRequest` and other classes to align imports by length.

## [0.1.0-beta.2] - 2026-03-17

### Added
- `Session` endpoint with `start()` method to programmatically initiate WAHA sessions.
- Comprehensive draft documentation for multiple modules:
  - Contacts and LID
  - Sessions API and Events
  - Sending and Receiving Messages
  - Profile, Polls, Chats, Channels, Groups, Presence, Labels, and Calls
  - Event Messages and Observability

### Changed
- Renamed `Contacts` facade and endpoint to `Contact` (singular) for consistency.
- Updated default `WAHA_ENGINE` from `GOWS` to `WEBJS`.

## [0.1.0-beta.1] - 2026-03-16

### Added
- Initial release of Laravel WAHA package.
- `Status` endpoint with support for:
  - `sendText()`: Send a text status update.
  - `sendImage()`: Send an image status update.
- `Contact` endpoint with support for:
  - `checkExists()`: Check if a phone number exists on WhatsApp.
- DTOs for structured data:
  - `TextStatusData`
  - `ImageStatusData`
- Saloon PHP integration for API requests.
- Laravel Service Provider and Facades.
- Documentation built with VitePress.
