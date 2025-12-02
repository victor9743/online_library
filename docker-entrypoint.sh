#!/bin/sh
set -e

# Ajusta o UID/GID
usermod -u 1000 www-data
groupmod -g 1000 www-data

# Garante que os diretórios existem
mkdir -p storage bootstrap/cache

# Aplica permissões
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

# Executa o comando CMD do Dockerfile
exec "$@"
