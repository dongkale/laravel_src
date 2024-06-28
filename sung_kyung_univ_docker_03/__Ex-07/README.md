- https://hub.docker.com/r/bitnami/laravel

docker run --name laravel -v ${PWD}/my-project:/app bitnami/laravel:latest

- https://hub.docker.com/r/shinsenter/laravel
  docker run --rm -p 80:80 -p 443:443 -p 443:443/udp -v ./application:/var/www/html shinsenter/laravel:latest

  docker run --rm -p 3002:8000 -v ./application:/var/www/html shinsenter/laravel:latest

php artisan serve --port=8080

http://localhost:8080/api/documentation

docker run -p 8000:80 -v ./application:/var/www/html laravelfans/laravel

docker run -p 8000:80 -v ./application:/var/www/html wodby/laravel-php

docker-compose up -d --build
