---
name: refine-doc
description: Use when refining or creating documentation for the Laravel WAHA package to ensure consistency with the existing style.
---

# Refine Documentation Skill

This skill helps in refining and creating documentation for the Laravel WAHA package, ensuring consistency with the existing documentation style.

## Guidelines

When refining or creating documentation, follow these structural and stylistic rules:

### Title and Subtitle

- **Title:** Use a single `#` for the main title (e.g., `# Create Session`).
- **Description:** Provide a brief one-sentence description below the title.
- **Subtitle:** Use `##` for sections like `## Usage`, `## Response`, `## Engines`, and `## References`.

### Code Blocks

- Use standard triple backticks for code blocks.
- Specify the language (usually `php`).
- Use `::: code-group` for multiple implementation examples (e.g., [Saloon Response] vs [DTO]).

Example:
```php
use NjoguAmos\Waha\Facades\Session;
use NjoguAmos\Waha\Dto\SessionCreateData;

$data = new SessionCreateData(
    name: 'default',
    start: true,
);

$session = Session::create(data: $data);
```

### Response Section

- Describe the response type.
- Show how to handle the response using `json()` and `dtoOrFail()`.
- Use `::: code-group` to separate raw response from DTO usage.

### Known Errors

- Use `###` for specific error scenarios under a `## Known Errors` section.
- Provide a code block showing the exception and the JSON response if possible.

### Engines Table

- Ensure a compatibility table for different WAHA engine is added. e.g.

| WEBJS | WPP | NOWEB | GOWS |
|:-----:|:---:|:-----:|:----:|
|   ✅   |  ✅  |   ✅   |  ✅   |

### References

- Always include a `## References` section at the end.
- Link to official WAHA documentation.
- Link to relevant DTO references using site-absolute paths (e.g., `/reference/dto/session-data.md`).

## Application Rules

1. **Strict Types:** Ensure code examples reflect the package's use of `declare(strict_types=1);` where applicable (though often omitted in usage docs for brevity).
2. **Naming:** Use "a Session" for single-resource endpoints.
3. **DTOs:** When a DTO is mentioned, ensure it's linked in the references.
4. **Consistency:** Mirror the structure and wording of existing documentation (e.g., sessions documentation).
