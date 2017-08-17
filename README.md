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

Start docker
```
project $ docker-compose up
```

Composer 
```
project/www $ docker-compose run manager composer list
project/www $ docker-compose run manager composer dump-autoload --optimize 
```

Create Project - CodeIgniter
```
project/www $ docker-compose run manager composer create-project codeigniter/framework
```


## Config

### mysql
* `MYSQL_ROOT_PASSWORD=root`
* `MYSQL_DATABASE=root`

### PHP
* ports
  * 80
  * 443
* volumes
  * www
            
### PHPMyAdmin
* `PMA_USER=root`
* `PMA_PASSWORD=root`
* ports
  * 8080
