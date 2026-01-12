# ITMobile Shared package

[![Tests](https://img.shields.io/github/actions/workflow/status/anvarious97/itm.common/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/anvarious97/itm.common/actions/workflows/run-tests.yml)

Shared Dto, Enums, etc. to use in ITMobile Services

## Installation

You can install the package via composer, after adding the repository:
```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "git@github.com:anvarious97/itm.common.git"
        }
    ]
}
```
```bash
composer require anvarious97/itm.common
```

## Usage

### Pagination (ApPaginator)

Упрощённый LengthAwarePaginator с чистым JSON (data, total, per_page, current_page, last_page).
В Laravel доступен макрос ->apiPaginate(), вне Laravel — через new ApiPaginator(...).

```php
// Laravel
$companies = Company::query()->apiPaginate(50);
// Common
use ITMobile\ITMobileCommon\Pagination\ApiPaginator;
$paginator = new ApiPaginator($items, $total, $perPage, $currentPage);
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Anvarious97](https://github.com/anvarious97)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
