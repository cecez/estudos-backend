export default class User {
  #nome;
  #email;
  #role;
  #ativo;

  constructor(nome, email, role, ativo = true) {
    this.#nome = nome;
    this.#email = email;
    this.#role = role || "estudante";
    this.#ativo = ativo;
  }

  get ativo() {
    return this.#ativo;
  }

  set nome(novoNome) {
    this.#nome = novoNome;
  }

  #metodoPrivado(argumento) {
    console.log(`Logando ${argumento}`);
  }

  toString() {
    return `${this.#nome} - ${this.#email}`;
  }
}
