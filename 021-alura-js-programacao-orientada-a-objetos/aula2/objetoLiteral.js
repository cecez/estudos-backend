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

const admin = {
  nome: "Adminer",
  role: "admin",
  criarCurso() {
    console.log("Curso criado.")
  }
};

Object.setPrototypeOf(admin, user);
admin.criarCurso();
admin.info();