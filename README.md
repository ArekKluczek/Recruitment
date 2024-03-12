Welcome to the RecruitmentBlog README. 
This document outlines the steps required for setting up the project, building, and running it locally. Ensure you follow these instructions to get the environment running correctly.

Prerequisites
Before building the project, you need to have ddev installed on your system. ddev is an open-source tool that makes it simple to get local PHP development environments up and running within minutes. For installation instructions, visit the ddev documentation https://ddev.readthedocs.io/en/latest/users/install/ddev-installation/.

If you are working on Windows, please download Docker Desktop before initialization

Steps for linux:
To build the project, follow these steps:
1) Initialize containers with ddev start
2) Run custom script: ddev init.sh

Steps for Windows:
To build the project, follow these steps:
1) Initialize containers with ddev start
2) Type these commands into terminal:
3) ddev start
4) ddev yarn install
5) ddev yarn encore dev
6) ddev php bin/console doctrine:migrations:migrate
7) ddev import-db -> when it ask for db type "db.sql"

Accessing the Application
After the setup is complete, you can access the application in your web browser:

The homepage can be viewed by launching: ddev launch or the URL provided by ddev.
To edit or add articles, you need to create an account. Register at /register.
Once registered, log in as an administrator at /login to access the admin features.
