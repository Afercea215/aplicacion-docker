FROM php:8.0-apache
RUN apt update && apt install -y git
COPY https://github.com/Afercea215/aplicacion-docker.git /var/www/html
WORKDIR  /var/www/html
EXPOSE 80