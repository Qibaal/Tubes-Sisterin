# Use the official PHP image
FROM php:8.2-cli

# Install required extensions for PostgreSQL and intl
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libicu-dev \
    zip unzip && \
    docker-php-ext-install pdo pdo_pgsql intl

# Set the working directory in the container
WORKDIR /var/www/html

# Copy application code to the container
COPY . /var/www/html

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Ensure writable and public/uploads directories exist
RUN mkdir -p /var/www/html/writable /var/www/html/public/uploads && \
    chown -R www-data:www-data /var/www/html/writable /var/www/html/public/uploads

# Expose port 8080 (optional if using PHP's built-in server)
EXPOSE 8080

# Set the default command to serve the application
CMD ["php", "-S", "0.0.0.0:8080", "-t", "public"]
