const passport = require("passport");

module.exports = {
  local: (requisicao, resposta, next) => {
    passport.authenticate(
      "local",
      { session: false },
      (erro, usuario, info) => {
        if (erro && erro.name === "InvalidArgumentError") {
          return resposta.status(401).json({ erro: erro.message });
        }

        if (erro) {
          return resposta.status(500).json({ erro: erro.message });
        }

        if (!usuario) {
          return resposta.status(401).json();
        }

        requisicao.user = usuario;
        return next();
      }
    )(requisicao, resposta, next);
  },

  bearer: (requisicao, resposta, next) => {
    passport.authenticate(
      "bearer",
      { session: false },
      (erro, usuario, info) => {
        if (erro && erro.name === "JsonWebTokenError") {
          return resposta.status(401).json({ erro: erro.message });
        }

        if (erro && erro.name === "TokenExpiredError") {
          return resposta
            .status(401)
            .json({ erro: erro.message, expiradoEm: erro.expiredAt });
        }

        if (erro) {
          return resposta.status(500).json({ erro: erro.message });
        }

        if (!usuario) {
          return resposta.status(401).json();
        }

        requisicao.token = info.token;
        requisicao.user = usuario;
        return next();
      }
    )(requisicao, resposta, next);
  },
};
