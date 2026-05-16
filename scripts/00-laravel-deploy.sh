#!/usr/bin/env bash
echo "=== Iniciando deploy do EcoJac ==="

# Garante que o diretório de storage tenha permissões corretas
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache
chown -R nginx:nginx /var/www/html/storage /var/www/html/bootstrap/cache

# Cria o arquivo do banco SQLite se não existir
touch /var/www/html/database/database.sqlite
chmod 664 /var/www/html/database/database.sqlite
chown nginx:nginx /var/www/html/database/database.sqlite

echo "Gerando cache de configurações..."
php artisan config:clear
php artisan route:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Executando migrações..."
php artisan migrate --force

# ===================================================================
# IMPORTANTE: O Render exige que o app escute na porta $PORT (10000).
# A imagem richarvey/nginx-php-fpm escuta por padrão na 80.
# Aqui sobrescrevemos a config do Nginx para usar a porta certa.
# ===================================================================
if [ -n "$PORT" ]; then
    echo "Configurando Nginx para escutar na porta $PORT (exigida pelo Render)..."
    sed -i "s/listen 80;/listen $PORT;/g" /etc/nginx/sites-available/default.conf
    sed -i "s/listen 80;/listen $PORT;/g" /etc/nginx/sites-enabled/default.conf 2>/dev/null || true
fi

echo "=== Deploy finalizado com sucesso! ==="
