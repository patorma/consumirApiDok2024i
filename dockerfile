# Usar la imagen oficial de PHP
FROM php:8.0-fpm

# Instalar dependencias necesarias
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip git

# Habilitar extensiones necesarias
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd pdo pdo_mysql

# Establecer el directorio de trabajo en /var/www
WORKDIR /var/www

# Copiar los archivos composer.json y composer.lock
COPY composer.json composer.lock /var/www/

# Instalar las dependencias de PHP con Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader

# Copiar el resto del proyecto al contenedor
COPY . /var/www

# Copiar el archivo .env al contenedor
COPY .env /var/www/.env

# Exponer el puerto
EXPOSE 8080

# Comando para iniciar el servidor
CMD ["php", "-S", "0.0.0.0:8080", "-t", "public"]
