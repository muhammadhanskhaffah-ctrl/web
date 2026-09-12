FROM php:8.2-fpm-alpine

# Install system deps
RUN apk add --no-cache \
    bash \
    curl \
    git \
    unzip \
    zip \
    nginx \
    supervisor \
    libpng-dev \
    libjpeg-turbo-dev \
    libwebp-dev \
    freetype-dev \
    oniguruma-dev \
    libxml2-dev \
    libzip-dev \
    icu-dev \
    g++ \
    make \
    autoconf \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && mkdir -p /var/www/html /run/nginx /var/log/nginx /var/log/supervisord

WORKDIR /var/www/html

# Copy project
COPY . /var/www/html

# Install PHP dependencies
RUN rm -f /var/www/html/.env \
    && composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --no-progress \
    && mkdir -p /var/www/html/storage/framework/cache /var/www/html/storage/framework/sessions /var/www/html/storage/framework/views /var/www/html/bootstrap/cache \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Nginx config
RUN cat > /etc/nginx/http.d/default.conf <<'EOF'
server {
    listen 8080;
    server_name _;
    root /var/www/html/public;
    index index.php index.html;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass 127.0.0.1:9000;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
EOF

# Supervisor config
RUN cat > /etc/supervisord.conf <<'EOF'
[supervisord]
nodaemon=true
user=root

[program:php-fpm]
command=/usr/local/sbin/php-fpm -F
autostart=true
autorestart=true
priority=10

[program:nginx]
command=/usr/sbin/nginx -g "daemon off;"
autostart=true
autorestart=true
priority=20
EOF

EXPOSE 8080

CMD ["/bin/sh", "-c", "\
    if [ -n \"$PORT\" ]; then \
        sed -i \"s|listen 8080;|listen ${PORT};|g\" /etc/nginx/http.d/default.conf; \
    fi; \
    php artisan migrate --force || true; \
    php artisan storage:link || true; \
    php artisan optimize:clear || true; \
    /usr/bin/supervisord -c /etc/supervisord.conf \
"]