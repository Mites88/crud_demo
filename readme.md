# Docker + Symfony Product Crud Demo
This is a Symfony + Docker proof of concept CRUD project, for demonstration purposes.

Some of the tools used in this project:
- Symfony 5
- Docker
- Doctrine ORM
- SQLite 3
- EasyAdmin 3
- Bootstrap 5

## Pre-requisites
Docker ((Installation instructions)[https://docs.docker.com/get-started/])

## Installation instructions:
Clone this repo by typing:  
`git clone https://github.com/Mites88/crud_demo.git`

Navigate to the main directory:  
`cd crud_demo`

Build docker images:  
`docker-compose up -d --build`

Navigate to our app directory:  
`cd app`

Install dependencies, give permissions, run migrations and run fixtures:  
`composer install -n  && chown -R :www-data var && symfony console --no-interaction doctrine:migrations:migrate && symfony console --no-interaction doctrine:fixtures:load`  
Todo: Automate these steps

You are set! Content will be served in this URL:  
`http://localhost:8080/admin`
