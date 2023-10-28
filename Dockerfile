# Utiliza la imagen oficial de PHP 8.1 con Apache
FROM php:8.1-apache

# Configura el directorio de trabajo en el directorio raíz de tu proyecto Laravel
WORKDIR /var/www/html

# Copia todo el contenido de tu proyecto Laravel (incluyendo la carpeta public) al contenedor
COPY . /var/www/html

# Configura los permisos de la carpeta de almacenamiento de Laravel (cambios añadidos)
RUN chown -R www-data:www-data /var/www/html/storage
RUN chmod -R 775 /var/www/html/storage

# Instala las dependencias de Laravel y otras herramientas necesarias
RUN apt-get update && \
    apt-get install -y libpng-dev libjpeg-dev zip unzip && \
    docker-php-ext-configure gd --with-jpeg && \
    docker-php-ext-install gd pdo pdo_mysql && \
    a2enmod rewrite

# Instala Composer globalmente
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    php -r "unlink('composer-setup.php');"

# Copia el archivo de configuración para Apache
COPY docker/apache-site.conf /etc/apache2/sites-available/000-default.conf

# Habilita el sitio en Apache
RUN a2ensite 000-default

# Expon el puerto 80
EXPOSE 80

# Inicia Apache en primer plano
CMD ["apache2-foreground"]
