const Usuario = require("./usuarios-modelo");
const { InvalidArgumentError, InternalServerError } = require("../erros");
const JWT = require("jsonwebtoken");
const blacklist = require("../../redis/manipula-blacklist");

function criaJWT(usuario) {
  const payload = { id: usuario.id };

  return JWT.sign(payload, process.env.CHAVE_JWT, { expiresIn: "15m" });
}

module.exports = {
  adiciona: async (req, res) => {
    const { nome, email, senha } = req.body;

    try {
      const usuario = new Usuario({
        nome,
        email,
      });

      await usuario.adicionaSenha(senha);
      await usuario.adiciona();

      res.status(201).json();
    } catch (erro) {
      if (erro instanceof InvalidArgumentError) {
        res.status(422).json({ erro: erro.message });
      } else if (erro instanceof InternalServerError) {
        res.status(500).json({ erro: erro.message });
      } else {
        res.status(500).json({ erro: erro.message });
      }
    }
  },

  lista: async (req, res) => {
    const usuarios = await Usuario.lista();
    res.json(usuarios);
  },

  login: (requisicao, resposta) => {
    const token = criaJWT(requisicao.user);
    resposta.set("Authorization", token);
    resposta.status(204).send();
  },

  logout: async (requisicao, resposta) => {
    try {
      const token = requisicao.token;
      await blacklist.adiciona(token);
      resposta.status(204).send();
    } catch (erro) {
      resposta.status(500).json({ erro: erro.message });
    }
  },

  deleta: async (req, res) => {
    const usuario = await Usuario.buscaPorId(req.params.id);
    try {
      await usuario.deleta();
      res.status(200).send();
    } catch (erro) {
      res.status(500).json({ erro: erro });
    }
  },
};
