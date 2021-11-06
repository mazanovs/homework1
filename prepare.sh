#!/bin/bash

MODE=dev

echo "Start prepare $MODE version";

if [ "$MODE" == "dev" ]; then
    echo "Get DEV Branch from GIT";
    # Installs the project dependencies from the composer.lock
    cd /homework/app/api/
    ./composer install
    # Then start dev server API
    cd /homework/app/public  
    php -S 0:8080

fi

if [ "$MODE" == "prod" ]; then
    echo "Get PROD Branch from GIT";
     # Installs the project dependencies from the composer.lock
    cd /homework/app/api/
    ./composer install
    # Then start dev server
    cd /homework/app/public
    php -S 0:8080
   
fi


