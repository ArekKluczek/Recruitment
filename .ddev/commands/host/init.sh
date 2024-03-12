#!/bin/bash
ddev composer install
ddev npm install
ddev php bin/console doctrine:migrations:migrate
ddev import-db --file=db.sql
