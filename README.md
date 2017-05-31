# docker-php
Docker with php, mariadb and phpmyadmin

Clone
```
$ git clone git@github.com:robertov82008/docker-php.git project && cd project
```

Project - Directory Apps
```
project $ mkdir www && cd www
```

Create Project - CodeIgniter
```
project/www $ composer create-project codeigniter/framework
```

Start docker
```
project $ docker-compose up
```

## Config

### mysql
* MYSQL_ROOT_PASSWORD=root
* MYSQL_DATABASE=root

### PHP
* ports
  * 80
  * 443
* volumes
  * www
            
### PHPMyAdmin
* PMA_USER=root
* PMA_PASSWORD=root
* ports
  * 8080
