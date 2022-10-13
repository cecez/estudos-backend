// com new e função construtora

function User(nome, email) {
  this.nome = nome;
  this.email = email;

  this.toString = function () {
    return `${this.nome} - ${this.email}`;
  };
}

const meuUser = new User("JP", "jp@jp.com");
console.log(meuUser.toString());

// com Object.create

const user = {
  init: function (nome, email) {
    this.nome = nome;
    this.email = email;
  },
  toString: function () {
    return `${this.nome} - ${this.email}`;
  },
};

const meuUser2 = Object.create(user);
meuUser2.init("JP 2", "jp2@jp.com");
console.log(meuUser2.toString());

// factory functions
function novoUsuario(nome, email) {
  return {
    nome,
    email,
    toString: function () {
      return `${nome} - ${email}`;
    },
  };
}

const meuUser3 = novoUsuario("JP 3", "jp3@jp.com");
console.log(meuUser3.toString());
