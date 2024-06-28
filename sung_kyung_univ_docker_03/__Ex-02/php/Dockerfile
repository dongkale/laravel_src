FROM php:8.3-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

EXPOSE 9000
CMD ["php-fpm"]


# FROM ubuntu:20.04

# ENV TZ=Asia/Seoul

# RUN export LC_ALL=C.UTF-8
# RUN DEBIAN_FRONTEND=noninteractive
# RUN rm /bin/sh && ln -s /bin/bash /bin/sh
# RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# RUN apt-get update
# RUN apt-get install -y \
#     sudo \
#     autoconf \
#     autogen \
#     language-pack-en-base \
#     wget \
#     zip \
#     unzip \
#     curl \
#     rsync \
#     ssh \
#     openssh-client \
#     git \
#     build-essential \
#     apt-utils \
#     software-properties-common \
#     nasm \
#     libjpeg-dev \
#     libpng-dev \
#     libpng16-16

# RUN useradd -m docker && echo "docker:docker" | chpasswd && adduser docker sudo

# # PHP
# RUN LC_ALL=en_US.UTF-8 add-apt-repository ppa:ondrej/php && apt-get update && apt-get install -y php8.1
# RUN apt-get install -y \
#     php8.1-curl \
#     php8.1-gd \
#     php8.1-dev \
#     php8.1-xml \
#     php8.1-bcmath \
#     php8.1-mysql \
#     php8.1-pgsql \
#     php8.1-mbstring \
#     php8.1-zip \
#     php8.1-bz2 \
#     php8.1-sqlite \
#     php8.1-soap \
#     php8.1-intl \
#     php8.1-imap \
#     php8.1-imagick \
#     php-memcached
# RUN command -v php

# # Composer
# RUN curl -sS -k https://getcomposer.org/installer | php
# RUN mv composer.phar /usr/local/bin/composer && \
#     chmod +x /usr/local/bin/composer && \
#     composer self-update
# RUN command -v composer

# # Node.js
# RUN curl -sL -k https://deb.nodesource.com/setup_20.x -o nodesource_setup.sh
# RUN bash nodesource_setup.sh
# RUN apt-get install nodejs -y
# RUN npm install npm@6 -g
# RUN command -v node
# RUN command -v npm

# # Other
# RUN mkdir ~/.ssh
# RUN touch ~/.ssh_config

# # Display versions installed
# RUN php -v
# RUN composer --version
# RUN node -v
# RUN npm -v

# FROM flamy/php-composer-node-npm

# ARG APP_ENV
# ENV APP_HOME /var/www/html
# ENV USERNAME=root

# ENV TZ=Asia/Seoul

# WORKDIR $APP_HOME

# RUN apt-get update && apt-get install -y \
#     git \
#     curl \
#     libpng-dev \
#     libonig-dev \
#     libxml2-dev \
#     zip \
#     unzip

# RUN npm install -g npm
# RUN echo http://dl-2.alpinelinux.org/alpine/edge/community/ >> /etc/apk/repositories
# RUN apk --no-cache add shadow && usermod -u 1000 www-data

# RUN docker-php-ext-install mysqli pdo pdo_mysql
# RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
# COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# EXPOSE 9000
# CMD ["php-fpm"]

# Add user for laravel application
#RUN addgroup -g ${GID} ${USERNAME}
#RUN adduser -D -s /bin/bash -G ${USERNAME} -u 1337 ${USERNAME}
#RUN usermod -a -G ${USERNAME} nginx


# # Copy existing application directory contents
# #COPY . $APP_HOME
# COPY --chown=${USERNAME}:${USERNAME} . $APP_HOME

# #Copy supervisor to manage nginx and php processes
# COPY ./docker/php-fpm/supervisord.conf /etc/
# #Nginx config
# COPY ./docker/nginx/default.conf /etc/nginx/http.d/default.conf
# #PHP ini config
# COPY ./docker/php-fpm/php.ini /usr/local/etc/php/php.ini

# # Docker entrypoint script
# COPY ./docker/php-fpm/docker-entrypoint.sh /usr/local/bin/start-container
# RUN chmod +x /usr/local/bin/start-container

# #USER sail

# EXPOSE 80
# ENTRYPOINT ["start-container"]

# #Prod
# FROM digital_dealer_php AS digital_dealer_php_prod
# RUN composer install --ignore-platform-reqs --optimize-autoloader --no-dev
# RUN echo "building Prod with composer and npm"
# #COPY --chown=${USERNAME}:${USERNAME} .env.production $APP_HOME/.env
# COPY .env.production $APP_HOME/.env
# #RUN chown -R root /var/www/html
# RUN php artisan optimize:clear
# RUN php artisan storage:link
# RUN npm ci
# RUN npm run prod