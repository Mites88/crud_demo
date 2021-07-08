# Docker + Symfony Product Crud Demo
This is a Symfony + Docker proof of concept CRUD project, intended for demonstration purposes.

Some of the tools used in this project:
- Symfony 5
- Docker
- Doctrine ORM
- SQLite 3
- EasyAdmin 3
- Bootstrap 5

## Installation instructions:
Clone this repo by typing:  
`git clone https://github.com/Mites88/crud_demo.git`

Navigate to the main directory:  
`cd crud_demo`

Build docker images:  
`docker-compose up -d --build`

Navigate to our app directory:  
`cd app`

Install dependencies, run migrations and fixtures:  
`composer install -n && symfony console --no-interaction doctrine:migrations:migrate && symfony console --no-interaction doctrine:fixtures:load`

You are set! Content will be served in this URL:  
`http://localhost:8080/admin`
