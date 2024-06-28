FROM ubuntu:20.04

LABEL version="1.0"
LABEL description="bible-univ Server"

# Set Timezone
ENV TZ=Asia/Seoul
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Set Locale
RUN apt update -y && apt upgrade -y
RUN apt install -y locales

RUN localedef -i ko_KR -f UTF-8 ko_KR.UTF-8
ENV LANGUAGE ko_KR.UTF-8
ENV LANG ko_KR.UTF-8
ENV LC_ALL ko_KR.UTF-8
ENV LC_CTYPE ko_KR.UTF-8
ENV LC_MESSAGES ko_KR.UTF-8

# Install Apache & PHP 8.18.1
RUN apt install -y software-properties-common unzip
RUN add-apt-repository ppa:ondrej/php
RUN apt update

RUN apt install -y \
    apache2 \
    php8.1 \
    php8.1-curl php8.1-gd php8.1-mbstring php8.1-mysql php8.1-soap php8.1-json \
    php8.1-intl php8.1-zip php8.1-xml php8.1-xmlrpc php8.1-cli php8.1-xsl \
    php8.1-dev php8.1-xdebug

RUN a2enmod php8.1
RUN a2enmod rewrite

ADD settings/php-8.1.ini /etc/php/8.1/apache2/php.ini
ADD settings/apache2-vhost.conf /etc/apache2/sites-available/000-default.conf
ADD settings/xdebug.ini /etc/php/8.1/mods-available/xdebug.ini
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN . /etc/apache2/envvars

# Install Node.js
ENV NVM_DIR /usr/local/nvm
ENV NODE_VERSION 16.19.0

WORKDIR $NVM_DIR
RUN apt install -y build-essential curl
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.2/install.sh | bash
RUN . $NVM_DIR/nvm.sh \
    nvm install $NODE_VERSION \
    nvm alias default $NODE_VERSION \
    nvm use default

ENV NODE_PATH $NVM_DIR/versions/node/v$NODE_VERSION/lib/node_modules
ENV PATH      $NVM_DIR/versions/node/v$NODE_VERSION/bin:$PATH

# Register the COMPOSER_HOME environment variable
ENV COMPOSER_HOME /composer

# Add global binary directory to PATH and make sure to re-export it
ENV PATH /composer/vendor/bin:$PATH

# Allow Composer to be run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

# Setup the Composer installer
RUN curl -o /tmp/composer-setup.php https://getcomposer.org/installer && \
    curl -o /tmp/composer-setup.sig https://composer.github.io/installer.sig && \
    php -r "if (hash('SHA384', file_get_contents('/tmp/composer-setup.php')) !== trim(file_get_contents('/tmp/composer-setup.sig'))) { unlink('/tmp/composer-setup.php'); echo 'Invalid installer' . PHP_EOL; exit(1); }" && \
    php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    php -r "unlink('/tmp/composer-setup.php');"

WORKDIR /var/www/html/bible-univ
# COPY composer.* package*.json ./
# RUN composer install --no-scripts --no-autoloader
# RUN npm install
# COPY . .

VOLUME ["/var/www/html/bible-univ"]
EXPOSE 80 9003

ENTRYPOINT ["apachectl", "-D", "FOREGROUND"]
