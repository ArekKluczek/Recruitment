RecruitmentBlog Project Setup Guide
Welcome to the RecruitmentBlog project! This README is a comprehensive guide designed to help you set up and run the RecruitmentBlog environment on your local machine. Please follow the steps carefully to ensure a smooth setup.

Prerequisites
Before you proceed with building the project, you need to have the following prerequisites installed on your system:

ddev: An open-source tool that facilitates the setup of PHP development environments quickly and easily. You can find the installation guide in the ddev documentation.

Docker Desktop (for Windows users): If you are operating on a Windows platform, please ensure Docker Desktop is installed before you initialize the project.

Project Build Instructions
For Linux Users:
Execute the following steps to set up your development environment:

Start the containers using the command:
1) ddev start
2) ddev init.sh

For Windows Users:
Please follow these instructions in your terminal to build the project:
1) ddev start
2) ddev composer install
3) ddev yarn install
4) ddev yarn encore dev
5) ddev php bin/console doctrine:migrations:migrate
6) ddev import-db -> Import the database when prompted; type "db.sql" as the database name

Accessing the Application
After completing the setup, you can view the homepage and access the application:

Launch the application in your web browser using:
ddev launch

Alternatively, you can use the URL provided by ddev.

To contribute articles, please register for an account at /register.

Post-registration, log in at /login with administrator credentials to utilize the admin features.

API Endpoints
For a straightforward understanding of the available API endpoints, navigate to the /swagger URL, where you will find documentation outlining each one.

You can also directly access specific endpoints:

To view the top authors from the last week:
/api/top-authors-last-week

To read news articles by their ID:
/api/news/{id}

To access author details by their ID:
/api/author/{authorId}
