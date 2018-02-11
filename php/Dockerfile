FROM php:7.2-apache

# Die im Image enthaltenen Sourcen für diverse Module entpacken
RUN docker-php-source extract

# Voraussetzungen schaffen, um libicu zu installieren
# update und install MÜSSEN in einer Zeile stehen und mit && verbunden werden
RUN apt-get update && apt-get install -y apt-transport-https
RUN echo 'deb http://private-repo-1.hortonworks.com/HDP/ubuntu14/2.x/updates/2.4.2.0 HDP main' >> /etc/apt/sources.list.d/HDP.list
RUN echo 'deb http://private-repo-1.hortonworks.com/HDP-UTILS-1.1.0.20/repos/ubuntu14 HDP-UTILS main'  >> /etc/apt/sources.list.d/HDP.list
RUN echo 'deb [arch=amd64] https://apt-mo.trafficmanager.net/repos/azurecore/ trusty main' >> /etc/apt/sources.list.d/azure-public-trusty.list

# libicu ist Voraussetzung für intl (ohne -y bricht die Installation mit einer Frage ab)
RUN apt-get install -y libicu-dev

RUN docker-php-ext-install intl
RUN docker-php-ext-install pdo_mysql

# xdebug muss über PECL installiert werden
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

# Nachdem jetzt alles installiert ist, können die Sourcen wieder gelöscht werden
RUN docker-php-source delete

# Apache und PHP konfigurieren
COPY ./apache2.conf /etc/apache2/apache2.conf
COPY ./000-default.conf /etc/apache2/sites-enabled/000-default.conf
COPY ./php.ini /usr/local/etc/php/php.ini
COPY ../www/index.php /var/www/index.php
RUN a2enmod rewrite