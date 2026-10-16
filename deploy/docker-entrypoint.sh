#!/bin/sh
set -eu

php artisan migrate --force
php artisan config:cache
php artisan view:cache

exec "$@"
