FROM php:8.6.0RC5-apache

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf && \
    a2enmod rewrite headers
