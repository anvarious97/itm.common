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

### Авторизация (Использование IAM авторизации)

После установки пакет автоматически регистрирует [AuthServiceProvider](src/Providers/AuthServiceProvider.php), middleware ``'iam.auth'`` и кастомный ``jwt`` guard.
Что позволяет проверять токен и извлекать из него необходимую информацию.

#### Настройка

Добавьте публичный ключ (или путь к нему) в .env:
```dotenv
IAM_PUBLIC_KEY="-----BEGIN PUBLIC KEY-----\nMIIBIjANBgkq...\n-----END PUBLIC KEY-----"
# или
IAM_PUBLIC_KEY=file://C:\Projects\itm.iam\storage\secure\jwt\public.pem
```
Опубликуйте config (опционально):
```bash
php artisan vendor:publish --provider="ITMobile\ITMobileCommon\Providers\AuthServiceProvider" --tag=config
```
Также внесите изменения в config ``auth``:
```php
...
'defaults' => [
    'guard' => 'api',
    'passwords' => null,
],
'guards' => [
    'api' => [
        'driver' => 'jwt',
        'provider' => 'jwt',
    ]
],
...
```

Если функционал провайдера не нужен, то в конфиге можно отключить его:
```php
...
'enabled' => false,
...
```

#### Использование middleware
Middleware [AuthenticateJwt](src/Auth/Middleware/AuthenticateJwt.php) имеет алиас ``iam.auth`` и проверяет JWT и делает доступным пользователя в ``$request->user()`` и ``Auth::guard('api')->user()`` или ``Auth::user()`` (если ``defaults.guard`` = ``api``).

Также доступны middleware для проверки ролей/прав - ``iam.role:role`` и ``iam.permission:perm``

### Инициализация ролей/прав в других сервисах (внешние системные права/роли)

Для удобства и единого формата создан [IamClient](src/Client/IamClient.php) для удобного инита, использовать можно так: 
```php
$client = new IamClient(
    baseUrl: config('services.iam.url'),
    defaultHeaders: ['Authorization' => 'Bearer ' . config('services.iam.token')] // Как пример, для внутренних роутов авторизация не требуется
);
```
И потом где требуется (в сидере или в комманде):
```php
use \ITMobile\ITMobileCommon\Dto\Role\RoleCreateDto;

$client->ensurePermissions(['test.view', 'test.create']);
$client->ensureRole(new RoleCreateDto('test.service', ['test.view', 'test.create']));
```

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
