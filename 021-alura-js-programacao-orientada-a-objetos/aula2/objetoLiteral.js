const user = {
  nome: "Cezarius",
  email: "email@email.com",
  info: function () {
    console.log(this.nome, this.email);
  },
};

user.info();

const exibir = function () {
  console.log(this.nome);
};

const exibirNome = exibir.bind(user);
exibirNome();
