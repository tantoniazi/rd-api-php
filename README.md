# PROVA RD

- Utilizei o framework lumen usando os seguintes pacotes
- "albertcht/lumen-testing": "^1.1",
- "darkaonline/swagger-lume": "6.*",
- "flipbox/lumen-generator": "^6.0",
- "illuminate/routing": "^6.17",
- "laravel/lumen-framework": "^6.0",
- "zircote/swagger-php": "^3.0"

## DOCKER

para rodar o projeto
docker-compose up -d --build


## SWAGGER
http://localhost:8181/api/documentation


## TESTES

para rodar o teste é necessário conectar no docker e rodar o comando:
docker exec -ti rd-api-php bash
phpunit

