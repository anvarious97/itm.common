# Changelog

All notable changes to `itm.common` will be documented in this file.

## [0.0.2] - 2025-12-26
### Added
- DTO для `Company`:
    - `CompanyDto`, `CompanyCreateDto`, `CompanyUpdateDto`
    - `CompanyRelationDto`, `CompanyRelationCollectionDto`  
      (расширяют `BaseDto`, поддержка `fromArray()` и кастинг Enum типов)
- Enums для `Company`: `CompanyType` и `CompanyRelationType`
- Pest тесты для всех DTO
