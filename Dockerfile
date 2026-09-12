FROM node:22-alpine AS frontend

WORKDIR /app

COPY package.json package-lock.json ./
RUN npm ci

COPY vite.config.js tailwind.config.js postcss.config.js ./
COPY resources ./resources
RUN npm run build

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
COPY --from=frontend /app/public/build /var/www/html/public/build

# Install PHP dependencies
RUN rm -f /var/www/html/.env \
    && composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --no-progress \
    && mkdir -p /var/www/html/storage/framework/cache /var/www/html/storage/framework/sessions /var/www/html/storage/framework/views /var/www/html/bootstrap/cache \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

COPY docker/nginx.conf /etc/nginx/http.d/default.conf
COPY docker/supervisord.conf /etc/supervisord.conf

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
