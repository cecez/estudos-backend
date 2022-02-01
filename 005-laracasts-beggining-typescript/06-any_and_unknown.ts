// any
// indica ao checador de tipos para simplesmente desligar

// nõa gera erro
const logger = (something: any): void => {
    console.log(something.toUpperCase())
}
// logger('Hello')
// logger({obj: "eto"})

// gera erro, pois faz checagens de tipo
// const logger2 = (something: unknown): void => {
//     console.log(something.toUpperCase())
// }
// logger2({"co": "co"})

// resolvendo problema do tipo unknown (checando tipo antes de acessar/executar metodo)
const logger3 = (something: unknown): void => {
    if (typeof something === 'string') {
        console.log(something.toUpperCase())
    } else {
        console.log(something)
    }
}
logger3("uma stringue")
logger3({"nao": "string"})

// evitar ao máximo utilizar tipo "any", pois basicamente não faz checagem nenhuma de tipo, permitindo bugs
// exemplo:

type tipoAny = { prop1: any, prop2: any }
const constAny: tipoAny = { prop1: "stringue", prop2: 123 }
console.log(constAny.prop2.qualquerCoisaAquiPoisNaoTemChecagem.e.aqui.tambem)

// um pouco melhor com unknown
type tipoUnknown = { prop1: unknown, prop2: unknown }
const constUnknown: tipoUnknown = { prop1: "stringue", prop2: 123 }
console.log(constUnknown.prop2.coco.coco)