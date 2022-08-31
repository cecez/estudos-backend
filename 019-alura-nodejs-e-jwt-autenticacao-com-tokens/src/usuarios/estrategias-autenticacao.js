const passport = require("passport");
const LocalStrategy = require("passport-local");
const Usuario = require("./usuarios-modelo");
const { InvalidArgumentError } = require("../erros");
const bcrypt = require("bcrypt");

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
