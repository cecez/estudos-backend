// void
const logging = (param: unknown): void => console.log(param)

// null
interface User {
    id: string;
    email: string;
    name: string|null;
    age: number|null;
    cpf?: number;   // pode ser undefined
}

const criaUsuario = (email: string): User => ({
    id: "uuid-1",
    email,
    name: null,
    age: null,
})

const user: User = criaUsuario("email@email.com")