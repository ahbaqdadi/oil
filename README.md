# Oil

Oil is a small PHP library for composing application logic as a one-shot list
of callable stages. Choose an engine based on how those stages should run:

- `PipeLine` passes each stage's return value to the next stage.
- `SinglePipe` runs only the first queued stage.
- `Mediator` invokes every stage with the same payload and ignores return values.

## Requirements

- PHP 8.3 or later

## Installation

```bash
composer require ah-b/oil:^0.2
```

## Pipeline example

```php
<?php

use Oil\OilService;
use Oil\Patterns\PipeLine;

$pipeline = new OilService(new PipeLine());
$pipeline->add(static fn (string $payload): string => trim($payload));
$pipeline->add(static fn (string $payload): string => strtoupper($payload));

$result = $pipeline->run('  hello  '); // HELLO
```

Stages are consumed by the next `run()` call. They are cleared whether the run
returns successfully or throws, so add the stages again for each execution.
Running `PipeLine` or `SinglePipe` with no queued stages returns the input
payload unchanged.

## Single-pipe example

Use `SinglePipe` when only the first queued handler should process a payload:

```php
<?php

use Oil\OilService;
use Oil\Patterns\SinglePipe;

$pipe = new OilService(new SinglePipe());
$pipe->add(static fn (array $payload): array => [...$payload, 'validated' => true]);

$result = $pipe->run(['id' => 42]);
```

## Mediator example

Use `Mediator` for side-effect handlers that all receive the same payload. The
engine returns `null` because handler return values are intentionally ignored.

```php
<?php

use Oil\OilService;
use Oil\Patterns\Mediator;

$event = new stdClass();
$mediator = new OilService(new Mediator());
$mediator->add(static function (object $event): void {
    // Notify one subscriber.
});
$mediator->add(static function (object $event): void {
    // Notify another subscriber.
});

$mediator->run($event);
```

## Development

Install dependencies and run the test suite:

```bash
composer install
composer validate --strict
composer test
```

CI also audits the locked dependencies and runs the suite on PHP 8.3, 8.4,
and 8.5.

## Compatibility

- `0.2.x` requires PHP 8.3 or later.
- `0.1` is the original 2019 release and is no longer maintained.

See [CHANGELOG.md](CHANGELOG.md) for release details.

## License

Oil is released under the [MIT License](LICENSE).
