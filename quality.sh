#!/usr/bin/env bash
docker-compose exec php php vendor/bin/phpstan analyse src
docker-compose exec php php vendor/bin/psalm  src --show-info=true
docker-compose exec php php vendor/bin/phpunit

