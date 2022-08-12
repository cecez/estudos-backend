import express from "express";
import AutorController from "../controllers/autorController.js";

const router = express.Router();

router.get("/autores", AutorController.listarAutores);
router.get("/autores/:id", AutorController.listaAutor);
router.post("/autores", AutorController.cadastraAutor);
router.put("/autores/:id", AutorController.atualizaAutor);
router.delete("/autores/:id", AutorController.excluirAutor);

export default router;
