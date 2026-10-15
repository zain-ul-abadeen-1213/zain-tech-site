# Production image — Zain Tech Automation Solutions website
FROM php:8.2-apache

# PHP extensions required by the app (PDO + MySQL driver)
RUN docker-php-ext-install pdo pdo_mysql

# Allow .htaccess overrides (custom 404 page)
RUN sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Copy application code
COPY . /var/www/html/

# Correct ownership for Apache
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
