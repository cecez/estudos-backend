import express from "express";

const app = express();
app.use(express.json());

const livros = [
  { id: 1, titulo: "Java efetivo" },
  { id: 2, titulo: "Xangô de Baker Street" },
];

app.get("/", (requisicao, resposta) => {
  resposta.status(200).send("Curso de Node com Express");
});

app.get("/livros/:id", (requisicao, resposta) => {
  const id = requisicao.params.id;
  const indice = buscaLivro(id);
  resposta.status(200).json(livros[indice]);
});

app.put("/livros/:id", (requisicao, resposta) => {
  const id = requisicao.params.id;
  const indice = buscaLivro(id);
  livros[indice].titulo = requisicao.body.titulo;
  resposta.status(200).json(livros[indice]);
});

app.delete("/livros/:id", (requisicao, resposta) => {
  const { id } = requisicao.params;
  const indice = buscaLivro(id);
  if (indice >= 0) {
    livros.splice(indice, 1);
  }
  resposta.status(200).json(livros);
});

app.get("/livros", (requisicao, resposta) => {
  resposta.status(200).json(livros);
});

app.post("/livros", (requisicao, resposta) => {
  livros.push(requisicao.body);
  resposta.status(201).send("Livro cadastrado com sucesso");
});

function buscaLivro(id) {
  return livros.findIndex((livro) => livro.id == id);
}

export default app;
