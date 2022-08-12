import express from "express";
import LivroController from "../controllers/livroController.js";

const router = express.Router();

router.get("/livros", LivroController.listarLivros);
router.get("/livros/editora", LivroController.listaLivrosPorEditora);
router.get("/livros/:id", LivroController.listaLivro);
router.post("/livros", LivroController.cadastraLivro);
router.put("/livros/:id", LivroController.atualizaLivro);
router.delete("/livros/:id", LivroController.excluirLivro);

export default router;
