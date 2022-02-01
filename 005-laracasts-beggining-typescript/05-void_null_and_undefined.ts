// void
const logging = (param: unknown): void => console.log(param)

// null
interface User2 {
    id: string;
    email: string;
    name: string|null;
    age: number|null;
    cpf?: number;   // pode ser undefined
}

const criaUsuario = (email: string): User2 => ({
    id: "uuid-1",
    email,
    name: null,
    age: null,
})

const user: User2 = criaUsuario("email@email.com")