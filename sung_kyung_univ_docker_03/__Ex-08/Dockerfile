FROM ubuntu:22.04

LABEL version="1.0"
LABEL description="BibleUniv-Server"

# Set Timezone
ENV TZ=Asia/Seoul
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Set Locale
RUN apt-get update -y && apt-get upgrade -y
RUN apt-get install -y locales

RUN localedef -i ko_KR -f UTF-8 ko_KR.UTF-8
ENV LANGUAGE ko_KR.UTF-8
ENV LANG ko_KR.UTF-8
ENV LC_ALL ko_KR.UTF-8
ENV LC_CTYPE ko_KR.UTF-8
ENV LC_MESSAGES ko_KR.UTF-8

RUN apt-get clean
RUN rm -rf /var/lib/apt/lists/*
RUN apt-get update -o Acquire::CompressionTypes::Order::=gz
RUN apt-get update && apt-get upgrade

# Install Apache & PHP 8.1
RUN apt-get install -y php8.1-curl php8.1-mysql php8.1-readline php8.1-mbstring php8.1-xml php8.1-zip php8.1-intl php8.1-fpm


VOLUME ["/var/www/html/bible"]
EXPOSE 80 9003
