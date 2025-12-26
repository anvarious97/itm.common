<?php

namespace ITMobile\ITMobileCommon\Enums\Company;

enum CompanyType: string
{
    case DEPTRANS = 'deptrans';
    case OBLTRANS = 'obltrans';
    case CENTRAL_DISPATCH = 'central_dispatch';
    case DISPATCH = 'dispatch';
    case PRIVATE = 'private';
    case SERVICE_VEHICLE = 'service_vehicle';
    case SERVICE_EQUIPMENT = 'service_equipment';
    case SERVICE = 'service';
    case BRANCH = 'branch';
    case OTHER = 'other';

    public function label(): string
    {
        return match ($this) {
            self::DEPTRANS => 'ДепТранс',
            self::OBLTRANS => 'ОблТранс',
            self::CENTRAL_DISPATCH => 'Центральная диспетчерская',
            self::DISPATCH => 'Диспетчерская',
            self::PRIVATE => 'Частная компания',
            self::SERVICE_VEHICLE => 'Обслуживание машин',
            self::SERVICE_EQUIPMENT => 'Обслуживание оборудования',
            self::SERVICE => 'Обслуживание',
            self::BRANCH => 'Филиал',
            self::OTHER => 'Другое',
        };
    }
}
