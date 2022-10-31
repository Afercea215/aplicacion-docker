FROM php:8.0-apache
RUN apt update && apt install -y git
COPY . /var/www/html
WORKDIR  /var/www/html
EXPOSE 80
