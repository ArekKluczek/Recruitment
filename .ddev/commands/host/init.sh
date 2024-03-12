#!/bin/bash
ddev composer install
ddev yarn install
ddev yarn encore dev
ddev php bin/console doctrine:migrations:migrate
ddev import-db --file=db.sql
