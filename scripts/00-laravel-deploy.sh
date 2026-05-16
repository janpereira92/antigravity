#!/usr/bin/env bash
echo "Iniciando deploy do Laravel..."

# Instala dependências se necessário (embora o Dockerfile já devesse ter)
# composer install --no-dev --working-dir=/var/www/html

echo "Limpando caches..."
php artisan config:clear
php artisan route:clear

echo "Cacheando configurações para performance..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Executando migrações (SQLite)..."
# Cria o arquivo do banco se não existir
touch /var/www/html/database/database.sqlite
php artisan migrate --force

echo "Deploy finalizado!"
