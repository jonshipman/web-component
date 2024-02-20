#!/usr/bin/env bash

ThisScriptsDirectory=$( cd -- "$( dirname -- "${BASH_SOURCE[0]}" )" &> /dev/null && pwd )
tmp=${TMPDIR:-/tmp}

cd "$ThisScriptsDirectory"
export NODE_ENV="production"
composer install --no-dev
npm run build

mkdir "$tmp/web-component"
rsync -av --delete \
	--exclude=node_modules/ \
	--exclude=src/ \
	--exclude=*.config.js \
	--exclude=package.json \
	--exclude=package-lock.json \
	--exclude=phpcs.xml.dist \
	--exclude=composer.lock \
	--exclude=composer.json \
	--exclude=.gitignore \
	--exclude=.DS_STORE \
	--exclude=*.cmd \
	--exclude=*.sh \
./ "$tmp/web-component/"

rsync -av --delete ./vendor/ "$tmp/web-component/vendor/"

cd "$tmp"

zip -r "$ThisScriptsDirectory/../web-component.zip" web-component

cd "$ThisScriptsDirectory"

rm -fr "$tmp/web-component"
