const blacklist = require("./blacklist");
const { promisify } = require("util");
const JWT = require("jsonwebtoken");
const { createHash } = require("crypto");

const existsAsync = promisify(blacklist.exists).bind(blacklist);
const setAsync = promisify(blacklist.set).bind(blacklist);

function criaTokenHash(token) {
  return createHash("sha256").update(token).digest("hex");
}

module.exports = {
  adiciona: async (token) => {
    const expiraEm = JWT.decode(token).exp;
    const tokenHash = criaTokenHash(token);
    await setAsync(tokenHash, "");
    blacklist.expireat(tokenHash, expiraEm);
  },
  existe: async (token) => {
    const tokenHash = criaTokenHash(token);
    const resultado = await existsAsync(tokenHash);
    return resultado === 1;
  },
};
