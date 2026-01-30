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

### Пагинация (ApiPaginator)

Добавлен [упрощённый LengthAwarePaginator](src/Pagination/ApiPaginator.php) с чистым JSON без лишних мета (data, total, per_page, current_page, last_page).
В Laravel доступен макрос ->apiPaginate() (регистрируется автоматом в Laravel выше 5.5, в остальных надо руками зарегистрировать [PaginationServiceProvider](src/Pagination/PaginationServiceProvider.php)), вне Laravel — через new ApiPaginator(...).

```php
// Laravel
$companies = Company::query()->apiPaginate(50);
// Common
use ITMobile\ITMobileCommon\Pagination\ApiPaginator;
$paginator = new ApiPaginator($items, $total, $perPage, $currentPage);
```

### Даты (хранение, обмен между сервисами)
Все даты в БД для удобства должны храниться в UTC, также обмен датами между сервисами, должен быть в одном формате. Мы используем `DateTimeInterface::ATOM`.
Формат определяется централизованно и указан в [ApiDateFormat](src/Contracts/Date/ApiDateFormat.php).

Для нормализации дат можно использовать [DateNormalizer](src/Support/Date/DateNormalizer.php):
```php
DateNormalizer::normalize($value)
```
Для корректной сериализации в Eloquent моделях можно использовать трейт [UsesApiDateFormat](src/Eloquent/Concerns/UsesApiDateFormat.php):
```php
use Illuminate\Database\Eloquent\Model;
use ITMobile\ITMobileCommon\Eloquent\Concerns\UsesApiDateFormat;

class MyModel extends Model
{
    use UsesApiDateFormat;
}
```

### Фильтрация и сортировка
Для упрощенной сортировки и фильтрации в запросах можно использовать [QueryHelper](src/Support/Builder/QueryHelper.php).

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
