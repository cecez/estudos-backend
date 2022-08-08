const http = require("http");

const rotas = {
  "/": "Raiz do projeto",
  "/autor": "Dados do autor",
  "/livro": "Dados do livro",
};

const servidor = http.createServer((requisicao, resposta) => {
  resposta.writeHead(200, "OK", { "Content-Type": "text/plain" });
  resposta.end(rotas[requisicao.url]);
});

servidor.listen(3000, () => {
  console.log("Escutando ...");
});
