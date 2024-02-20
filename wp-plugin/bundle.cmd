@ECHO OFF
SETLOCAL EnableDelayedExpansion

SET ThisScriptsDirectory=%~dp0

CD %ThisScriptsDirectory%
SET "NODE_ENV=production"
CALL composer install --no-dev
CALL npm run build

CALL MKDIR "%TEMP%\web-component"
CALL ROBOCOPY.EXE .\ %TEMP%\web-component\ /E /XD node_modules src /XF *.config.js package.json package-lock.json phpcs.xml.dist composer.lock composer.json .gitignore *.cmd *.sh .Thumbs.db
CALL ROBOCOPY.EXE .\vendor\ %TEMP%\web-component\vendor\ /E

CD %TEMP%

CALL TAR.EXE -ac -f %ThisScriptsDirectory%\..\web-component.zip web-component

CD %ThisScriptsDirectory%

CALL RMDIR /S /Q "%TEMP%\web-component"
