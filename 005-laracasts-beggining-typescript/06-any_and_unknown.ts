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
//console.log(constAny.prop2.qualquerCoisaAquiPoisNaoTemChecagem.e.aqui.tambem) <- erro na execução apenas

// forma "aceita" de utilizar any (fazendo mais checagens pelo código)
type tipoUnknown = { prop1: unknown, prop2: any }
const constUnknown: tipoUnknown = { prop1: "stringue", prop2: { "foo": "bar" } }
// console.log(constUnknown.prop1.coco.coco)  <-- gera erro

if (
    constUnknown.prop2 && // verifica se não é undefined
    typeof constUnknown.prop2 === 'object' && // verifica se é objeto
    Object.hasOwnProperty.call(constUnknown.prop2, 'foo')
) {
    //console.log(constUnknown.prop2.foo);
    
    // casting
    console.log(
        (constUnknown.prop2 as {foo: unknown}).foo
    )
}

// casting para tipos vindos do HTML (ex: HTMLElement, HTMLCanvasElement)
// <canvas id="meu_canvas">
const canvas = document.getElementById('meu_canvas') as HTMLCanvasElement;