# Changelog

All notable changes to this project are documented in this file.

## [0.2.0] - 2026-09-23

### Added

- Read-only CI that validates Composer metadata, audits locked dependencies,
  and runs the test suite on PHP 8.3, 8.4, and 8.5.
- Regression coverage for one-shot stage cleanup and empty single-pipe runs.

### Changed

- Raised the supported runtime to PHP 8.3 or later.
- Updated the development test stack from PHPUnit 7 to PHPUnit 12.
- Expanded the README with complete examples and explicit engine semantics.

### Fixed

- Clear queued stages even when an engine or stage throws, preventing failed
  work from leaking into the next run.
- Return the original payload when `SinglePipe` has no queued stage instead of
  raising an undefined-array-key warning.

## [0.1] - 2019-05-31

- Initial release.

[0.2.0]: https://github.com/ahbaqdadi/oil/compare/0.1...0.2.0
[0.1]: https://github.com/ahbaqdadi/oil/releases/tag/0.1
