# docker-php
Docker with php, mariadb and phpmyadmin

[Template](https://github.com/robertov82008/slim-template/)

[Template simplificado](https://github.com/robertov82008/slim-template/tree/easy)

Clone
```bash
$ git clone git@github.com:robertov82008/docker-php.git project && cd project
```

Start docker
```bash
project $ docker-compose up
```

Composer 
```bash
project $ docker-compose run manager composer list
```

Fix's 
```bash
# Permissions
sudo chmod 777 -R logs

# Autoload composer 
project $ docker-compose run manager composer dump-autoload --optimize 
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
