FROM php:8.3-apache

# Instalar PostgreSQL de forma más robusta
RUN apt-get update && apt-get install -y \
    postgresql \
    postgresql-client \
    libpq-dev \
    && docker-php-ext-install pgsql pdo pdo_pgsql \
    && apt-get clean

# Verificar que las extensiones estén instaladas
RUN php -m | grep pgsql

# Habilitar mod_rewrite
RUN a2enmod rewrite

# Copiar código
COPY . /var/www/html/

# Permisos
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80