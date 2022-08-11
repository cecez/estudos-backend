import express from "express";
import livros from "../routes/livroRoutes.js";

const routes = (app) => {
  app.route("/").get((requisicao, resposta) => {
    resposta
      .status(200)
      .send({ titulo: "Curso de NodeJs com Express com MongoDB." });
  });

  app.use(express.json(), livros);
};

export default routes;
