<?php

declare(strict_types=1);

namespace ITMobile\ITMobileCommon\Enums\Iam;

/**
 * Зафиксированные системные / канонические роли IAM (имя Spatie Role).
 */
enum IamSystemRole: string
{
    case SuperAdmin = 'super-admin';
    /** Администратор платформы (все права IAM). */
    case Admin = 'admin';
    /** Администратор компании: объединение прав ролей компании + управление ими. */
    case CompanyAdmin = 'company-admin';
    /** Руководитель компании (агрегат directors в списке компаний). */
    case Director = 'director';
    case Dispatcher = 'dispatcher';
    case Driver = 'driver';

    /**
     * @return list<string>
     */
    public static function values(): array
    {
        return array_map(static fn (self $r): string => $r->value, self::cases());
    }

    public function rank(): int
    {
        return match ($this) {
            self::SuperAdmin => 100,
            self::Admin => 80,
            self::CompanyAdmin => 60,
            self::Director => 40,
            self::Dispatcher, self::Driver => 20,
        };
    }

    public static function isSystemName(string $name): bool
    {
        return self::tryFrom($name) !== null;
    }
}
