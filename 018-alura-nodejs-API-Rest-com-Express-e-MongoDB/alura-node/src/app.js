import express from "express";
import db from "./config/db.js";
import routes from "./routes/index.js";

db.on("error", console.log.bind(console, "Erro de conexão com db."));
db.once("open", () => {
  console.log("Conexão com db realizada com sucesso.");
});

const app = express();
app.use(express.json());
routes(app);

export default app;
