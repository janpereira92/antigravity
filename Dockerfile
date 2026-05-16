FROM richarvey/nginx-php-fpm:latest

# Copia o código da aplicação
COPY . .

# Configurações da imagem
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Configurações do Laravel para Produção
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

# Permite que o composer rode como root
ENV COMPOSER_ALLOW_SUPERUSER 1

# Instala as dependências com o composer durante o build
RUN composer install --no-dev --optimize-autoloader --working-dir=/var/www/html

# Garante permissões corretas para o Laravel
RUN chown -R nginx:nginx /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Expõe a porta 80 (será sobrescrita pelo script de start)
EXPOSE 80

# Comando para iniciar
CMD ["/start.sh"]
