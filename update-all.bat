@echo off
setlocal enabledelayedexpansion

REM Переходим в директорию, где лежит скрипт
cd /d "%~dp0"
cd ..

set BASE_DIR=%CD%

echo Base directory: %BASE_DIR%
echo.

for /d %%D in (itm.*) do (
    if /I not "%%D"=="itm.common" (

        echo ================================
        echo Updating %%D
        echo ================================

        cd /d "%BASE_DIR%\%%D"

        echo --- git pull ---
        git pull

        if exist composer.json (
            echo --- composer update anvarious97/itm.common ---
            composer update anvarious97/itm.common
        )

        echo.
    )
)

echo Done.
pause
