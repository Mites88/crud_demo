# Docker + Symfony Product Crud Demo
Attention: this project is intended for demonstration purposes only and is not suitable for production

Some of the tools used:
- Symfony 5
- Docker
- Doctrine ORM
- SQLite 3
- EasyAdmin 3

## Installation instructions:

Prerequiste: Docker

Clone this repo by typing:  
``git clone https://github.com/Mites88/crud_demo.git``

Navigate to the main directory:  
``cd crud_demo``

Build docker images:  
``docker-compose up -d --build``  

Navigate to our demo app directory, install dependencies and run migrations:  
``cd app && composer install && symfony console doctrine:migrations:migrate``

Open admin URL in your browser:  
``http://localhost:8080/admin``