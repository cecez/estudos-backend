export default class User {
  constructor(nome, email, role, ativo = true) {
    this.nome = nome;
    this.email = email;
    this.role = role || "estudante";
    this.ativo = ativo;
  }

  toString() {
    return `${this.nome} - ${this.email}`;
  }
}
