interface Serializavel {
    serialize(x: unknown): string
}

interface Identificavel {
    "uuid": string
}

const algumaCoisa: Serializavel & Identificavel = {
    "uuid": "123",
    serialize(x: unknown): string {
        return JSON.stringify(x)
    }
}

type Dicionario = {
    [key: string]: string
}
type OutroDicionario = Record<string, string>
type RegistroDesconhecido = Record<PropertyKey, unknown>


// os tipos em uma intersecção precisam ser compatíveis
// exemplo de não-compatíveis

interface Tipinho {
    ttl: number,
    name: string
}

type NaoRolaNao = Tipinho & Record<string, string>
// const naoDa: NaoRolaNao = {
//     ttl: 1,
//     name: "seila"
// }

// https://www.typescriptlang.org/docs/handbook/2/everyday-types.html#union-types