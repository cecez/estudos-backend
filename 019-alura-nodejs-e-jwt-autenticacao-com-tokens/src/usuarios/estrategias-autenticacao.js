const passport = require("passport");
const LocalStrategy = require("passport-local").Strategy;
const BearerStrategy = require("passport-http-bearer").Strategy;
const Usuario = require("./usuarios-modelo");
const { InvalidArgumentError } = require("../erros");
const bcrypt = require("bcrypt");
const JWT = require("jsonwebtoken");
const blacklist = require("../../redis/manipula-blacklist");

function verificaUsuario(usuario) {
  if (!usuario) {
    throw new InvalidArgumentError("Usuário inválido.");
  }
}

async function verificaTokenNaBlacklist(token) {
  const tokenNaBlacklist = await blacklist.existe(token);
  if (tokenNaBlacklist) {
    throw new JWT.JsonWebTokenError("Logout já realizado para este token.");
  }
}

async function verificaSenha(senha, senhaHasheada) {
  const senhaValida = await bcrypt.compare(senha, senhaHasheada);
  if (!senhaValida) {
    throw new InvalidArgumentError("Usuário inválido.");
  }
}

passport.use(
  new LocalStrategy(
    {
      usernameField: "email",
      passwordField: "senha",
      session: false,
    },
    async (email, senha, done) => {
      try {
        const usuarioPesquisado = await Usuario.buscaPorEmail(email);
        verificaUsuario(usuarioPesquisado);
        await verificaSenha(senha, usuarioPesquisado.senhaHasheada);
        done(null, usuarioPesquisado);
      } catch (erro) {
        done(erro);
      }
    }
  )
);

passport.use(
  new BearerStrategy(async (token, done) => {
    try {
      await verificaTokenNaBlacklist(token);
      const payload = JWT.verify(token, process.env.CHAVE_JWT);
      const usuario = await Usuario.buscaPorId(payload.id);
      done(null, usuario, { token: token });
    } catch (erro) {
      done(erro);
    }
  })
);
