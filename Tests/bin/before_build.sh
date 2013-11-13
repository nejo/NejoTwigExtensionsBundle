#!/bin/sh

composer config -g preferred-install source

sed -i -e "s/\"minimum-stability\": \"stable\"/\"minimum-stability\": \"${MIN_STABILITY}\"/" composer.json

composer --no-interaction --no-update require symfony/symfony:${SYMFONY_VERSION} symfony/twig-bundle:${SYMFONY_VERSION}
composer --no-interaction --no-update require --dev symfony/symfony:${SYMFONY_VERSION}
composer --no-interaction update