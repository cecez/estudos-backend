import User from "./User.js";
import Admin from "./Admin.js";

const meuUser = new User("JP", "jp@jp.com", "admin");
const meuUser2 = new User("JP 2", "jp2@jp.com", "admin");
console.log(meuUser.toString());
console.log(meuUser2.toString());

const meuAdmin = new Admin("JP admin", "jpa@jp.com");
console.log(meuAdmin);
console.log(meuAdmin.criarCurso("ABC", 2));
