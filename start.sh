#!/usr/bin/env sh
set -eu

php artisan migrate --force
php artisan storage:link || true
php artisan optimize:clear || true

PORT="${PORT:-8080}"
sed -i "s|listen 8080;|listen ${PORT};|g" /etc/nginx/http.d/default.conf

/usr/bin/supervisord -c /etc/supervisord.conf