<?php

declare(strict_types=1);

namespace ITMobile\ITMobileCommon\Enums\Iam;

/**
 * Зафиксированные системные / канонические роли IAM (имя Spatie Role).
 */
enum IamSystemRole: string
{
    case SuperAdmin = 'super-admin';
    /** Руководитель компании (агрегат directors в списке компаний). */
    case Director = 'director';

    /**
     * @return list<string>
     */
    public static function values(): array
    {
        return array_map(static fn (self $r): string => $r->value, self::cases());
    }
}
