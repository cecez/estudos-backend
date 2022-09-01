const passport = require("passport");
const LocalStrategy = require("passport-local").Strategy;
const BearerStrategy = require("passport-http-bearer").Strategy;
const Usuario = require("./usuarios-modelo");
const { InvalidArgumentError } = require("../erros");
const bcrypt = require("bcrypt");
const JWT = require("jsonwebtoken");

function verificaUsuario(usuario) {
  if (!usuario) {
    throw new InvalidArgumentError("Usuário inválido.");
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
      const payload = JWT.verify(token, process.env.CHAVE_JWT);
      const usuario = await Usuario.buscaPorId(payload.id);
      done(null, usuario);
    } catch (erro) {
      done(erro);
    }
  })
);
