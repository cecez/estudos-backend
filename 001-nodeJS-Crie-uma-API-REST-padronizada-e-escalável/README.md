# Projeto de estudos para acompanhar curso Alura - NodeJS: Crie uma API REST padronizada e escalável

```bash
# build e execução do contêiner com NodeJS, npm e MySQL
docker-compose build
docker-compose up
docker exec -it CONTAINER_ID /bin/bash

# preparando o ambiente do projeto
npm init -y
npm install express body-parser sequelize mysql2 config
node api/index.js

```

Status HTTP:
* sucesso:
    * 200 - ok
    * 201 - ok e recurso criado
    * 204 - ok e sem conteúdo de resposta
* falha:
    * 400 - requisição inválida / mal formatada
    * 404 - não encontrado
* mais informações em: 
    * https://developer.mozilla.org/en-US/docs/Web/HTTP/Status 
    * (ou https://http.cat)