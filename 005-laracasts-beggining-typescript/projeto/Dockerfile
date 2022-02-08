FROM node:17

# atualiza npm e instala nest-cli
RUN npm install -g npm@8.4.1 
RUN npm i -g @nestjs/cli

WORKDIR /home/app
USER node
ENV PORT 3000

EXPOSE 3000

ENTRYPOINT /bin/bash