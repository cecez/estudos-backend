```terminal
docker-compose up -d --build
docker exec -it [container] bash
```

- Qualquer import ou declaração de variável que o código não utiliza, o compilador acusa e impede compilação (bem bolado)
- Variáveis declaradas mas não atribuídas, recebem um valor inicial, dependendo do seu tipo (p. ex: int=0, string="", float32=0.0)

- Pacotes padrão Go: https://pkg.go.dev/std