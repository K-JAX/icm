#!/bin/bash

# podman network create --subnet 192.6.0.1/16 newicmnet

# podman pod create --name=icm --share cgroup,ipc,uts

NAME='icm-mysql'
podman run \
    --name $NAME \
    --network newicmnet \
    -e MYSQL_ALLOW_EMPTY_PASSWORD='yes' \
    -e MYSQL_DATABASE=blugiant_icm_inv \
    -e MYSQL_USER=blugiant_icm_inv \
    -e MYSQL_PASSWORD=RxnweRFv \
    --add-host icm-mysql:127.0.0.1 \
    -p 3307:3307 \
    -d mysql:5.7


mysql_port_status(){
    podman exec -it $NAME mysqladmin pin -h 127.0.0.1 | grep "alive"
}

import_sql_when_ready(){
    sleep 3
    mysql_port_status
    if [ $? -eq 0 ]
    then
        echo 'yes its running...'
        podman exec --log-level debug  -i $NAME mysql -ublugiant_icm_inv -pRxnweRFv -h127.0.0.1 --protocol=tcp --port=3306 blugiant_icm_inv < ./config/mysql/mysql-dump/blugiant_icm_inv.sql
    else
        echo 'waiting for mysql container to run'
        import_sql_when_ready
    fi
}
import_sql_when_ready

NAME='drupal'
podman run \
    --name $NAME \
    -v ./drupal:/var/www/html:cached \
    -v ./config/php/uploads.ini:/usr/local/etc/php/conf.d/uploads.ini \
    --privileged \
    --network newicmnet \
    -e DRUPAL_DATABASE_HOST=icm-mysql \
    -e DRUPAL_DATABASE_PORT=3306 \
    -e DRUPAL_DATABASE_NAME=blugiant_icm_inv \
    -e DRUPAL_DATABASE_USERNAME=blugiant_icm_inv \
    -e DRUPAL_DATABASE_PASSWORD=RxnweRFv \
    --add-host icm-mysql:127.0.0.1 \
    -p 8080:80 \
    -d drupal:7.69

NAME='phpmyadmin'
podman run \
    --name $NAME \
    --network newicmnet \
    -e PMA_HOST=icm-mysql \
    -e PMA_USER=blugiant_icm_inv \
    -e PMA_PASSWORD=RxnweRFv \
    -e PHP_UPLOAD_MAX_FILESIZE=1G \
    -e PHP_MAX_INPUT_VARS=1 \
    --add-host icm-mysql:127.0.0.1 \
    -p 8001:80 \
    -d phpmyadmin/phpmyadmin:5
