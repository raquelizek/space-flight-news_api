<h1 align="center">
  Space Flight News API
</h1>
<br>

<div align="center">
<img src="https://static.wixstatic.com/media/3c43a1_6c07c4089196418c821432295a0dcb05~mv2.png/v1/crop/x_0,y_258,w_4501,h_985/fill/w_540,h_148,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/Space%20Flight%20News%20Logo%20-%20CREAM%20BASE%20(MAIN)_Website%20Banner.png">
</div>
<br>

##  👩🏽‍💻 Technologies

This project was developed with the following technologies:

- [Laravel 8](https://laravel.com/docs/8.x/releases)
- [MongoDB Atlas](https://www.mongodb.com/atlas/database)
- [Docker](https://www.docker.com/)

## 🚀 How to run

Clone the repository and access the project.

```bash
$ git clone https://github.com/raquelizek/space-flight_api.git
$ cd space-flight_api
```

To start the project without Docker:
```bash
# Run:
$ composer install
# And start the application:
$ php artisan serve

# Run this commands to install MongoDB Package:
$ sudo pecl install mongodb
#Add the following line to your php.ini file:
extension="mongodb.so"
#Run the following command to add the MongoDB package for Laravel:
$ composer require jenssegers/mongodb

#Configure MongoDB Database:

#Add your database connection information environment variable called DB_URI. Make sure to include the correct authentication information.
#Set the default database connection name in config\database.php:

'default' => env('DB_CONNECTION', 'mongodb'),

```

To start the project with Docker:
```bash
# Run the command which will build the application:
$ docker-compose build api 
#Run the command to upload the container:
$ docker-compose up -d
#Run the command to list the containers:
$ docker-compose ps
#Run the command:
$ docker-compose exec api rm -rf vendor composer.lock
#Run the command to install composer:
$ docker-compose exec api composer install

#The last thing we need to do before testing the application is to generate a unique application key with the artisan Laravel:
$ docker-compose exec api php artisan key:generate
#Now go to your browser and access your server’s domain name or IP address on port 9000:
http://localhost:9000

#Configure MongoDB Database:
# First log into the running container
$ docker exec -it spaceflight-api/bin/bash

# List folder content
$ ls /usr/local/etc/php

# Which outputs following line
conf.d  php.ini-development  php.ini-production

#Add the following line to your php.ini-production file:
extension="mongodb.so"
```

## 💻 Project

Space Flight News is a platform where you will find information about space flights.

This is a challenge by [Codesh](https://coodesh.com/)

---
