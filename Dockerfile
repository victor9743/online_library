FROM php:8.2-fpm

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    curl libpq-dev libzip-dev zip unzip git && \
    docker-php-ext-install pdo pdo_pgsql zip

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

# Configura usuário e grupo
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Configura diretório de trabalho
WORKDIR /var/www/html

# Copia arquivos do projeto
COPY . .

# Corrige propriedade e permissões ANTES de instalar dependências
RUN chown -R www:www /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Alternativa mais segura (apenas pastas específicas):
RUN mkdir -p storage bootstrap/cache \
    && chown -R www:www storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Instala dependências como usuário www
USER www
RUN composer install --no-interaction --no-dev --optimize-autoloader

# Volta para root para garantir permissões (opcional)
USER root

# Configura permissões finais
RUN chmod -R 775 storage bootstrap/cache

# Garante que o PHP-FPM roda como usuário www
RUN sed -i "s/user = www-data/user = www/g" /usr/local/etc/php-fpm.d/www.conf \
    && sed -i "s/group = www-data/group = www/g" /usr/local/etc/php-fpm.d/www.conf