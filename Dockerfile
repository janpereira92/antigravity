FROM richarvey/nginx-php-fpm:latest

# Copia o código da aplicação
COPY . .

# Configurações da imagem
ENV SKIP_COMPOSER 0
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

# Expõe a porta padrão do Render (ou 80)
EXPOSE 80

# Comando para iniciar
CMD ["/start.sh"]
