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

# ver pacotes desatualizados
npm outdated

# criar migração
npx sequelize-cli migration:generate --name add-deletedAt-columns

# executar migração
npx sequelize-cli db:migrate
```

- Documentação Sequelize: https://sequelize.org/master/