<?php

namespace ITMobile\ITMobileCommon\Enums\Company;

enum CompanyRelationType: string
{
    case CHILD = 'child';
    case PARTNER = 'partner';
    case SERVICE_PROVIDER = 'service_provider';
    case SUPERVISOR = 'supervisor';
    case OTHER = 'other';

    public function label(): string
    {
        return match($this) {
            self::CHILD => 'Дочерняя',
            self::PARTNER => 'Партнёрская',
            self::SERVICE_PROVIDER => 'Сервисная компания',
            self::SUPERVISOR => 'Контролируемая',
            self::OTHER => 'Другое',
        };
    }
}

