// tipos básicos
const saudacao: string = "Olá TS"
const ano: number = 2022

// função
const adicionaDoisNumeros = (a: number, b: number): number => a + b;

// função com retorno de objeto
const getUsuarioById = (id: string): {id: string, nome: string} => ({id, nome: "Cezar Rosa"})
const usuario = getUsuarioById('uuid-2')    // usuario automaticamente recebe o tipo {id: string, nome: string}
console.log(usuario.nome)

// definindo tipos com interfaces
interface User {
    id: string;
    nome: string;
    idade: number;
}
const saveUser = (user: User): boolean => (console.log('salvando', {user}) && true);