# Dockerfile
FROM php:8.2-fpm

# Set working dir
WORKDIR /var/www

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libonig-dev \
    zlib1g-dev \
    libpng-dev \
    libxml2-dev \
    libpq-dev \
    curl \
    wget \
    build-essential

# Extensiones PHP requeridas
RUN docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl bcmath

# Instalar composer (copiando desde la imagen oficial de composer)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copiar el código (se montará como volumen en docker-compose para desarrollo)
COPY . /var/www

# Permisos
RUN chown -R www-data:www-data /var/www && chmod -R 755 /var/www

EXPOSE 9000
CMD ["php-fpm"]
