import User from "./User.js";

export default class Admin extends User {
  constructor(nome, email, ativo = true) {
    super(nome, email, "admin", ativo);
  }

  criarCurso(nome, vagas) {
    return `Curso ${nome} criado com ${vagas} vagas.`;
  }
}
